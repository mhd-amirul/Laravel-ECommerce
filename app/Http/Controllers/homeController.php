<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\contactRequest;
use App\Http\Requests\updateProfileRequest;
use App\Models\contact;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Resource;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Http\Request;

class homeController extends Controller
{
    protected $basic = [];
    protected $product;
    protected $generalService;

    public function __construct(GeneralServiceInterface $generalService)
    {
        $this->generalService = $generalService;
        $this->basic          = $this->generalService->basicItem();
        $this->product        = new Product();
    }

    public function goToIndex()
    {
        $product  = $this->product->latest()->where("discount", '<' ,50)->get();
        $discount = $this->product->latest()->where("discount", '>=' ,50)->get();

        return view("root.pages.index")
            ->with([
                "basic"     => $this->basic,
                "title"     => "home",
                "products"  => $product,
                "discount"  => $discount,
                "instagram" => Resource::where("group", "instagram")->get()
            ]);
    }

    public function goToProduct()
    {
        if (!request()->has("product"))
            return redirect()->route("index");

        $product = $this->product->where("id", request("product"))->with("Ratings")->first();
        $related = $this->product->byCategory($this->product, explode(',', str_replace(' ', '', $product->category)))->get();

        if ($product->Ratings->count() != 0)
            $product->rating = $product->Ratings->sum("rating") / $product->Ratings->count();

        return view("root.pages.product")->with([
            "basic"      => $this->basic,
            "title"      => "detail product",
            "product"    => $product,
            "related"    => $related,
            "breadcrumb" => [["route" => "product", "name" => "Detail Product"]]]);
    }

    public function saveMessage(contactRequest $request)
    {
        $contact = contact::create([
            "from"      => $request->email,
            "name"      => $request->name,
            "message"   => $request->message
        ]);

        if ($contact) {
            return redirect()->back()->with("session_success", "message was sent!");
        }

        return redirect()->back()->with("session_errors", "message not sent!");
    }
}
