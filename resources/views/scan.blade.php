<!DOCTYPE html>
<html>
    <head>
        <title>Scan Barcode Aset</title>
    </head>
    
    <body>

        <h2>Scan Barcode Aset</h2>

        <div id="reader" style="width:300px;height:300px;"></div>
        
        <h3>Hasil:</h3>
        <pre id="result"></pre>

        <script src="https://unpkg.com/html5-qrcode"></script>


        <script>
            function onScanSuccess(decodedText) {
                fetch('/scan/' + decodedText)
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('result').textContent = JSON.stringify(data, null, 2);
                });
            }

            let scanner = new Html5QrcodeScanner("reader", {
                fps: 10,
                qrbox: 250
            });

            scanner.render(onScanSuccess);
        </script>
    </body>
    