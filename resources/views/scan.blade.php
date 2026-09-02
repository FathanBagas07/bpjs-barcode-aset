@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/scan.css') }}">

@section('content')

    <h2>Scan QR Aset</h2>

    <div class="scan-wrapper">

        <div class="scan-card">

            <div id="reader"></div>

            <hr>

            <h5>Hasil Scan</h5>

            <div id="result" class="scan-result">
                <div class="result-placeholder">
                    📷 Arahkan kamera ke QR Code
                </div>
            </div>

        </div>

    </div>

    <script>
        window.scanUrl = "{{ url('/scan') }}";
    </script>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="{{ asset('js/scan.js') }}"></script>

@endsection