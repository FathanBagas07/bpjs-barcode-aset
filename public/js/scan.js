console.log("Scan JS loaded");

// fungsi saat scan berhasil
function onScanSuccess(decodedText) {

    console.log("Scanned:", decodedText);

    fetch(window.scanUrl + '/' + decodedText)
    .then(res => res.json())
    .then(res => {

        const resultBox = document.getElementById('result');

        if (res.status === 'error') {
            resultBox.innerHTML =
                `<span class="text-danger">${res.message}</span>`;
            return;
        }

        let data = res.data;

        resultBox.innerHTML = `
            <b>Nama:</b> ${data.nama_barang} <br>
            <b>Barcode:</b> ${data.kode_barcode} <br>
            <b>Lokasi:</b> ${data.lokasi ?? '-'} <br>
            <b>Kondisi:</b> ${data.kondisi ?? '-'}
        `;
    })
    .catch(err => {
        console.error(err);
    });

    // Efek suara
    let beep = new Audio('https://www.soundjay.com/buttons/beep-07.mp3');
    beep.play();
}

// inisialisasi scanner
function initScanner() {
    const reader = document.getElementById('reader');

    if (!reader) return;

    let scanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250
    });

    scanner.render(onScanSuccess);
}

// jalankan saat halaman siap
document.addEventListener("DOMContentLoaded", function () {
    initScanner();
});