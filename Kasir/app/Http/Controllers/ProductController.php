<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.product.product', [
            'title' => "Product",
            'active' => 'product',
            'products' => Barang::all()
        ]);
    }

    public function create_product()
    {
        return view('pages.product.create', [
            'title' => "Create Product",
            'active' => 'product',
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga_satuan' => 'required|numeric'
        ]);

        Barang::create($validatedData);

        return redirect('/product')->with('add_success', 'Produk berhasil ditambahkan!');
    }

    public function delete_product($id)
    {
        Barang::where('id', $id)->delete();

        return redirect('/product')->with('delete_success', 'Produk berhasil dihapus!');
    }

    public function edit_product($id)
    {
        return view('pages.product.edit', [
            'title' => "Edit Product",
            'active' => 'product',
            'data' => Barang::firstWhere('id', $id)
        ]);
    }

    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga_satuan' => 'required|numeric'
        ]);

        Barang::where('id', $id)->update($validatedData);

        return redirect('/product')->with('update_success', 'Data produk berhasil diperbarui!');
    }
}
