<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

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

    public function create_product() {
        return view('pages.product.create', [
            'title' => "Product",
            'active' => 'product',
        ]);
    }

    public function create(Request $request) {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga_satuan' => 'required|numeric'
        ]);

        Barang::create($validatedData);

        return redirect('/product')->with('add_success', 'Produk berhasil ditambahkan!');
    }
}
