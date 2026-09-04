<link rel="stylesheet" href="{{ asset('css/scan.css') }}">

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Scan
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="card asset-form-card mb-4">
            <div class="card-body">

                <div id="reader"></div>

                <h5 class="pt-3">Hasil Scan</h5>

                <div id="result" class="scan-result">
                    <div class="result-placeholder">
                        📷 Arahkan kamera ke QR Code
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

<script>
    window.scanUrl = "{{ url('/scan') }}";
</script>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="{{ asset('js/scan.js') }}"></script>