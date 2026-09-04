<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8">

            <!-- CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">

                <div>
                    <div class="card dashboard-stat-card card-aset p-3 text-white">
                        <h5>Total Aset</h5>
                        <h2>{{ $totalAset }}</h2>
                    </div>
                </div>

                <div>
                    <div class="card dashboard-stat-card card-scan p-3 text-white">
                        <h5>Total Scan</h5>
                        <h2>{{ $totalScan }}</h2>
                    </div>
                </div>

                <div>
                    <div class="card dashboard-stat-card card-today p-3 text-white">
                        <h5>Scan Hari Ini</h5>
                        <h2>{{ $scanHariIni }}</h2>
                    </div>
                </div>

            </div>

            <!-- CHARTS -->
            <div class="dashboard-chart-card w-full p-4 mb-4">
                <div class="relative h-80 w-full">
                    <canvas id="scanChart"></canvas>
                </div>
            </div>

            <div class="dashboard-chart-card w-full p-4">
                <div class="relative h-80 w-full">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>

<!-- DATA JS -->
<script>
    window.scanLabels = @json($scanPerHari->pluck('tanggal'));
    window.scanData = @json($scanPerHari->pluck('total'));

    window.totalAset = {{ $totalAset }};
    window.totalScan = {{ $totalScan }};
    window.scanHariIni = {{ $scanHariIni }};
</script>

<script src="{{ asset('js/dashboard.js') }}"></script>