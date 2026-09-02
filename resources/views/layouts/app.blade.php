<!DOCTYPE html lang="id">
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset System - BPJS Ketenagakerjaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/jamsostek.jpeg') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white custom-navbar fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/bpjs-ketenagakerjaan-logo.png') }}" alt="Logo BPJS" class="navbar-logo">
            </a>

            <!-- Navbar toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-around text-left">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/assets">Aset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/scan">Scan QR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logs">Log Scan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>