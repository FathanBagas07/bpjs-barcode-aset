<!DOCTYPE html>
<html>
    <body>
        <h2>{{ $asset->nama_barang }}</h2>

        <p>Kode: {{ $asset->kode_barcode }}</p>

        <div>
            {!! QrCode::size(200)->generate($asset->kode_barcode) !!}
        </div>
    </body>
</html>