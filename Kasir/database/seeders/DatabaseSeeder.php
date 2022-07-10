<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        Barang::create([
            'id' => 1,
            'nama_barang' => 'Sabun Batang',
            'harga_satuan' => 3000
        ]);
        Barang::create([
            'id' => 2,
            'nama_barang' => 'Mie Instan',
            'harga_satuan' => 2000
        ]);
        Barang::create([
            'id' => 3,
            'nama_barang' => 'Pensil',
            'harga_satuan' => 1000
        ]);
        Barang::create([
            'id' => 4,
            'nama_barang' => 'Kopi Sachet',
            'harga_satuan' => 1500
        ]);
        Barang::create([
            'id' => 5,
            'nama_barang' => 'Air Minum Galon',
            'harga_satuan' => 20000
        ]);
    }
}
