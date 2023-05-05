<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
                "basic"   => $this->basic,
                "title"   => "home",
                "products" => $product,
                "discount" => $discount
            ]);
    }

    public function goToProduct()
    {
        if (!request()->has("product"))
            return redirect()->route("index");

        $product = $this->product->where("id", request("product"))->first();
        $related = $this->product->byCategory($this->product, explode(',', str_replace(' ', '', $product->category)))->get();

        return view("root.pages.product")->with([
            "basic"      => $this->basic,
            "title"      => "detail product",
            "product"    => $product,
            "related"    => $related,
            "breadcrumb" => [["route" => "product", "name" => "Detail Product"]]]);
    }
}
