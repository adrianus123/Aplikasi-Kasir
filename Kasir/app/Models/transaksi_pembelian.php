<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_pembelian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transaction() {
        return $this->hasMany(transaksi_pembelian_barang::class);
    }

    static function tambahTransaksi($total_harga) {
        $data = transaksi_pembelian::create([
            'total_harga' => $total_harga
        ]);

        return $data->id;
    }
}
