<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function index()
    {
        $products = Barang::all();
        return view('pages.admin.barang.index')->with(['products' => $products]);
    }

    public function create()
    {
        return view('pages.admin.barang.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Barang::create($data);
        return redirect()->route('barang.index');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->back();
    }
}
