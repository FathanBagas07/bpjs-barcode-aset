<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index() {
        $assets = Asset::all();
        return view('assets.index', compact('assets'));
    }

    public function store(Request $request) {
        Asset::create($request->all());
        return redirect()->back();
    }

    public function scan(string $kode){
        $asset = Asset::where('kode_barcode', $kode)->first();

        return response()->json($asset ?? ['message' => 'Not found']);
    }
}
