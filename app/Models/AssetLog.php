<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetLog extends Model
{
    protected $fillable = [
        'asset_id',
        'kode_barcode',
        'aksi',
        'waktu'
    ];
}
