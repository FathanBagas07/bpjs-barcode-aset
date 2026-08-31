@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h2>Dashboard</h2>

<div class="row">
    <div class="col-md-4">
        <div class="card p-3">
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

<br>

<canvas id="scanChart"></canvas>

<script>
const labels = {!! json_encode($scanPerHari->pluck('tanggal')) !!};
const data = {!! json_encode($scanPerHari->pluck('total')) !!};

new Chart(document.getElementById('scanChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Scan',
            data: data,
            borderColor: 'blue',
            backgroundColor: 'rgba(0,0,255,0.2)',
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<br>

<canvas id="barChart"></canvas>

<script>
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Total Aset', 'Total Scan', 'Scan Hari Ini'],
        datasets: [{
            label: 'Statistik Sistem',
            data: [
                {{ $totalAset }},
                {{ $totalScan }},
                {{ $scanHariIni }}
            ],
            backgroundColor: ['green', 'blue', 'orange']
        }]
    }
});
</script>

@endsection