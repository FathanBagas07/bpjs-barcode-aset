<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'nama_barang',
        'kode_barcode',
        'lokasi',
        'kondisi'
    ];
}
