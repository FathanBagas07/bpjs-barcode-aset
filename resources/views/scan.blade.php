<link rel="stylesheet" rel="{{ asset('css/scan.css') }}">

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Scan
        </h2>
    </x-slot>

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
</x-app-layout>

{{-- DATA JS --}}
<script>
    window.scanUrl = "{{ url('/scan') }}";
</script>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="{{ asset('js/scan.js') }}"></script>