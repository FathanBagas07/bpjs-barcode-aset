<!DOCTYPE html>
<html>
    <head>
        <title>Manajemen Aset</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container mt-4">
        <div class="container">
            <h2>Manajemen Aset</h2>

            <!-- ALERT -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- FORM INPUT -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="/assets" method="POST">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" name="kode_barcode" class="form-control" placeholder="Kode Barcode" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" name="lokasi" class="form control" placeholder="Lokasi">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="kondisi" class="form-control" placeholder="Kondisi">
                        </div>

                        <button class="btn btn-primary">Tambah Aset</button>
                    </form>
                </div>
            </div>

            <!-- TABLE DATA -->
             <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>QR Code</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assets as $index => $asset)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $asset->nama_barang }}</td>
                        <td>
                            {!! QrCode::size(100)->generate($asset->kode_barcode) !!}
                        </td>
                        <td>{{ $asset->lokasi }}</td>
                        <td>{{ $asset->kondisi }}</td>
                        <td>
                            <form action="/assets/{{ $asset->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
             
        </div>
    </body>
</html>