<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetLog;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard', [
            'totalAset' => Asset::count(),
            'totalScan' => AssetLog::count(),
            'scanHariIni' => AssetLog::whereDate('created_at', today())->count(),
        ]);
    }
}
