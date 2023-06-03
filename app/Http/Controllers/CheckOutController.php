<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function testMidtrans()
    {
        return view('midtrans');
    }

    public function getdata(Request $request)
    {

        $product = Product::find($request->products);
        $product->sum_price = $product->price * $request->quantity;
        $product->quantity  = $request->quantity;
        $user = User::find($request->user_id);

        $checkOut = CheckOut::create([
            "user_id"   => $request->user_id,
            "products"  => $request->products,
            "sum_price" => $product->sum_price,
            "status"    => "unpaid"
        ]);

        $product->status = $checkOut->status;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config("midtrans.server_key");
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $checkOut->id,
                'gross_amount' => $checkOut->sum_price,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'email'      => 'budi.pra@example.com',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        
        return view("midtrans2")->with(["status" => true, "snapToken" => $snapToken, "product" => $product, "user" => $user]);
    }

    public function callback(Request $request)
    {
        dd($request);
    }
}
