<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Barang::with('galleries')->get();
        return view('pages.user.home', compact('products'));
    }
}
