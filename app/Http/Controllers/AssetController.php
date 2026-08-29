<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetLog;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index() {
        $assets = Asset::latest()->get();
        return view('assets.index', compact('assets'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barcode' => 'required|unique:assets',
        ]);
    
        Asset::create($request->all());

        return redirect()->back()->with('success','Aset berhasil ditambahkan');
    }

    public function destroy(int $id){
        Asset::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Aset dihapus');
    }

    public function scan(string $kode){
        $asset = Asset::where('kode_barcode', $kode)->first();

        // Simpan Log Scan
        AssetLog::create([
            'asset_id' => $asset?->id,
            'kode_barcode' => $kode,
            'aksi' => 'scan',
            'waktu' => now(),
        ]);

        // Jika tidak ditemukan
        if (!$asset) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aset tidak ditemukan'
            ]);
        }

        // Jika ditemukan
        return response()->json([
            'status' => 'success',
            'data' => $asset
        ]);
    }
}