<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assetlog;

class AssetLogController extends Controller
{
    public function index() {
        $logs = AssetLog::latest()->get();
        return view('logs.index', compact('logs'));
    }
}
