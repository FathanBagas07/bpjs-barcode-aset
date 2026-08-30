<!DOCTYPE html>
<html>
    <head>
        <title>BPJS Barcode Aset</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Aset BPJS</a>

                <div class="navbar-nav">
                    <a class="nav-link" href="/">Dashboard</a>
                    <a class="nav-link" href="/assets">Aset</a>
                    <a class="nav-link" href="/scan">Scan QR</a>
                    <a class="nav-link" href="/logs">Log Scan</a>
                </div>
            </div>
        </nav>
        <div class="container mt-4">
            @yield('content')
        </div>
    </body>
</html>