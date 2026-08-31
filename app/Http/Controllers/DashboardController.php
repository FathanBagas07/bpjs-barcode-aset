<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\AssetLog;

class DashboardController extends Controller
{
    public function index() {
        $totalAset = Asset::count();
        $totalScan = AssetLog::count();
        $scanHariIni = AssetLog::whereDate('created_at', today())->count();

        // Data Grafik 1: Scan per hari (7 hari terakhir)
        $scanPerHari = AssetLog::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('count(*) as total')
        )
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();

        return view('dashboard', compact(
            'totalAset',
            'totalScan',
            'scanHariIni',
            'scanPerHari'
        ));
    }
}
