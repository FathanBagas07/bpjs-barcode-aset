@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/logs.css') }}">

@section('content')

<h2>Riwayat Scan Aset</h2>

<div class="log-card">

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

@endsection