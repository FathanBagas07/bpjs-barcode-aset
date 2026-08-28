<!DOCTYPE html>
<html>
    <body>
        <h2>{{ $asset->nama_barang }}</h2>

        <p>Kode: {{ $asset->kode_barcode }}</p>

        <div>
            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($asset->kode_barcode) !!}
        </div>
    </body>
</html>