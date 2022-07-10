<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\transaksi_pembelian;
use App\Models\transaksi_pembelian_barang;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.transaction', [
            'title' => 'Transaction',
            'active' => 'transaction',
            'products' => Barang::all(),
            'cart' => session("cart")
        ]);
    }

    public function findProductId(Request $request)
    {
        $data = Barang::firstWhere('id', $request->id);
        return response()->json($data);
    }

    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required|integer|min:1'
        ]);

        $cart = session('cart');
        if (!empty($cart)) {
            foreach ($cart as $ct => $val) {
                if ($val['nama_produk'] == $validatedData['nama_barang']) {
                    $validatedData['jumlah'] += $val['jumlah'];
                }
            }
        }

        $cart[$validatedData['product_id']] = [
            'id_produk' => $validatedData['product_id'],
            'nama_produk' => $validatedData['nama_barang'],
            'harga_satuan' => $validatedData['harga'],
            'jumlah' => $validatedData['jumlah']
        ];

        session(["cart" => $cart]);

        return back();
    }

    public function deleteProduct($id)
    {
        $cart = session('cart');
        unset($cart[$id]);
        session(['cart' => $cart]);
        return back();
    }

    public function deleteAllProduct()
    {
        $cart = session('cart');

        if(empty($cart)) {
            return back()->with('empty', 'List belanja sudah kosong!');
        }

        session()->forget('cart');
        return back();
    }

    public function buyProduct($totalHarga)
    {
        $cart = session('cart');
        
        if(empty($cart)) {
            return back()->with('failed', 'Pilih produk terlebih dahulu!');
        }

        $id_transaksi = transaksi_pembelian::tambahTransaksi($totalHarga);
        foreach ($cart as $c => $val) {
            $id_produk = $c;
            $jumlah = $val['jumlah'];
            $harga_satuan = $val['harga_satuan'];
            transaksi_pembelian_barang::tambahTransaksiPembelian($id_transaksi, $id_produk, $jumlah, $harga_satuan);
        }

        session()->forget('cart');

        return redirect('/history');
    }
}