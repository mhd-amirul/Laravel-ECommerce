<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangRequest;

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

    public function store(BarangRequest $request)
    {
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

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('pages.admin.barang.edit')->with(['barang' => $barang]);
    }

    public function update($id, BarangRequest $request)
    {
        $barang = Barang::findorfail($id);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $barang->update($data);

        return redirect()->route('barang.index');
    }

    // public function show($id)
    // {
    // }
}
