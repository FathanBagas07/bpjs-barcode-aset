<link rel="stylesheet" href="{{ asset('css/logs.css') }}">

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Scan
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="card asset-form-card mb-4">
            <div class="table-responsive">

                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Kode Barcode</th>
                            <th>Aksi</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($logs as $index => $log)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <code>{{ $log->kode_barcode }}</code>
                                </td>
                                <td>
                                    <span class="badge-scan">
                                        {{ $log->aksi }}
                                    </span>
                                </td>
                                <td>
                                    {{ $log->waktu }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada data scan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</x-app-layout>