@extends('layouts.app')

@section('content')
    <h2>Scan QR Aset</h2>

    <div id="reader" style="width: 300px;"></div>

    <hr>

    <h4>Hasil Scan:</h4>
    <div id="result" class="alert alert-secondary">
        Menunggu scan...
    </div>

    <script>
        window.scanUrl = '{{ url('/scan') }}';
    </script>

    <script src="https://unpkg.com/html5-qrcode"></script>
<script src="{{ asset('js/scan.js') }}"></script>
@endsection