<!DOCTYPE html>
<html>
    <head>
        <title>Log Scan Aset</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container mt-4">
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
    </body>
</html>