@extends('layouts.app')

@section('content')

<h2>Dashboard</h2>

<div class="row">
    <div class="col-md-4">
        <div class='card p-3'>
            <h5>Total Aset</h5>
            <h2>{{ $totalAset }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Scan</h5>
            <h2>{{ $totalScan }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Scan Hari Ini</h5>
            <h2>{{ $scanHariIni }}</h2>
        </div>
    </div>
</div>

@endsection