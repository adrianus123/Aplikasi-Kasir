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
}
