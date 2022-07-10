<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_pembelian_barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products() {
        return $this->belongsTo(Barang::class);
    }

    public function buy_transactions() {
        return $this->belongsTo(transaksi_pembelian::class, 'transaksi_pembelian_id');
    }

    static function tambahTransaksiPembelian($id_transaksi, $id_barang, $jumlah, $harga_satuan) {
        transaksi_pembelian_barang::create([
            'transaksi_pembelian_id' => $id_transaksi,
            'master_barang_id' => $id_barang,
            'jumlah' => $jumlah,
            'harga_satuan' => $harga_satuan
        ]);
    }
}