<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Asset::create([
            'nama_barang' => 'Laptop Asus TUF',
            'kode_barcode' => 'AST001',
            'lokasi' => 'Ruang IT',
            'kondisi' => 'Baik'
        ]);
    }
}
