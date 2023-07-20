<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\contactRequest;
use App\Model\Resource;
use App\Services\Interfaces\GeneralServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class homeController extends Controller
{
    protected $basic = [];
    protected $productService;
    protected $generalService;

    public function __construct(GeneralServiceInterface $generalService, ProductServiceInterface $productService)
    {
        $this->generalService = $generalService;
        $this->basic          = $this->generalService->basicItem();
        $this->productService = $productService;
    }

    public function goToIndex()
    {
        $product  = $this->productService->getProductDiscount();

        return view("root.pages.index")
            ->with([
                "basic"     => $this->basic,
                "title"     => "home",
                "products"  => $product["product"],
                "discount"  => $product["discount"],
                "instagram" => Resource::where("group", "instagram")->get()
            ]);
    }

    public function goToProduct()
    {
        if (!request()->has("product"))
            return redirect()->route("index");

        $product = $this->productService->getInformationItem(request("product"));

        return view("root.pages.product")->with([
            "basic"      => $this->basic,
            "title"      => "detail product",
            "product"    => $product["product"],
            "related"    => $product["related"],
            "breadcrumb" => [["route" => "product", "name" => "Detail Product"]]]);
    }

    public function saveMessage(contactRequest $request)
    {
        $contact = $this->generalService->sendMessage([
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
