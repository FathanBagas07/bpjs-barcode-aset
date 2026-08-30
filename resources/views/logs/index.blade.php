@extends('layouts.app')

@section('content')
    <h2>Riwayat Scan Aset</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barcode</th>
                <th>Aksi</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $index => $log)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $log->kode_barcode }}</td>
                    <td>{{ $log->aksi }}</td>
                    <td>{{ $log->waktu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection