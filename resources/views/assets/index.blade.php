@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/assets.css') }}">

    @section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Aset
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- FORM -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="card asset-form-card mb-4">
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
                        <input type="text" name="lokasi" class="form-control" placeholder="Lokasi">
                    </div>

                    <div class="mb-2">
                        <input type="text" name="kondisi" class="form-control" placeholder="Kondisi">
                    </div>

                    <button class="btn btn-primary">Tambah Aset</button>

                </form>

            </div>
        </div>

        <!-- TABLE -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">QR Code</th>
                    <th class="text-center">Lokasi</th>
                    <th class="text-center">Kondisi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($assets as $index => $asset)
                    <tr>
                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle">{{ $asset->nama_barang }}</td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center">
                                {!! QrCode::size(100)->generate($asset->kode_barcode) !!}
                            </div>
                        </td>
                        <td class="align-middle">{{ $asset->lokasi }}</td>
                        <td class="text-center align-middle">{{ $asset->kondisi }}</td>
                        <td class="text-center align-middle">
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

</x-app-layout>