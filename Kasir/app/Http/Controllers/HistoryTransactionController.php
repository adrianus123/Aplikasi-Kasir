<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\transaksi_pembelian;
use App\Models\transaksi_pembelian_barang;

class HistoryTransactionController extends Controller
{
    public function index() {
        return view('pages.transaction.history', [
            'title' => 'History Transaction',
            'active' => 'history',
            'data' => transaksi_pembelian::all()
        ]);
    }

    public function detailTransaction($id) {
        return view('pages.transaction.detail', [
            'title' => 'Detail History Transaction',
            'active' => 'history',
            'data_transaksi' => transaksi_pembelian::firstWhere('id', $id)
        ]);
    }

    public function getDataBarang($id) {
        return view('pages.transaction.detail', [
            'title' => 'Detail History Transaction',
            'active' => 'history',
            'data_barang' => Barang::where('id', $id)
        ]);
    }
}