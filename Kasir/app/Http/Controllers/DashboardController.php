<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\transaksi_pembelian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'title' => "Dashboard",
            'active' => 'dashboard',
            'barangs' => Barang::all(),
            'transaksis' => transaksi_pembelian::all(),
            'total' => transaksi_pembelian::all()->sum('total_harga')
        ]);
    }
}
