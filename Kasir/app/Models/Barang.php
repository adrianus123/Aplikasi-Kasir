<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transactions() {
        return $this->hasMany(transaksi_pembelian_barang::class, 'master_barang_id');
    }
}
