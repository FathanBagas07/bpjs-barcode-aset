<!DOCTYPE html>
<html>
<head>
    <title>Scanner Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>📷 Scan Barcode Aset</h2>

<div id="reader" style="width: 300px;"></div>

<hr>

<h4>Hasil Scan:</h4>
<div id="result" class="alert alert-secondary">
    Menunggu scan...
</div>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>
function onScanSuccess(decodedText) {

    fetch('/scan/' + decodedText)
    .then(res => res.json())
    .then(res => {

        if(res.status === 'error') {
            document.getElementById('result').innerHTML =
                `<span class="text-danger">${res.message}</span>`;
            return;
        }

        let data = res.data;

        document.getElementById('result').innerHTML = `
            <b>Nama:</b> ${data.nama_barang} <br>
            <b>Barcode:</b> ${data.kode_barcode} <br>
            <b>Lokasi:</b> ${data.lokasi ?? '-'} <br>
            <b>Kondisi:</b> ${data.kondisi ?? '-'}
        `;
    });
}

let scanner = new Html5QrcodeScanner("reader", {
    fps: 10,
    qrbox: 250
});

scanner.render(onScanSuccess);
</script>

</body>
</html>