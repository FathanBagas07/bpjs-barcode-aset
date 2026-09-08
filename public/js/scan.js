console.log("Scan JS loaded");

/* =========================
   INIT SCANNER
========================= */
function initScanner() {
    const reader = document.getElementById("reader");
    if (!reader) return;

    const scanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250
    });

    scanner.render(onScanSuccess);
}

/* =========================
   HANDLE SCAN SUCCESS
========================= */
function onScanSuccess(decodedText) {

    console.log("Scanned:", decodedText);

    fetch(window.scanUrl + "/" + decodedText)
        .then(res => res.json())
        .then(res => {

            if (res.status === "error") {
                showResult(res.message, "error");
                return;
            }

            showResult(res.data, "success");

            playBeep();
        })
        .catch(err => {
            console.error(err);
            showResult("Terjadi kesalahan sistem", "error");
        });
}

/* =========================
   SHOW RESULT UI
========================= */
function showResult(data, type = "success") {
    const el = document.getElementById("result");

    if (!el) return;

    el.classList.remove("success", "error");

    if (type === "success") {
        el.classList.add("success");

        el.innerHTML = `
            ${data.foto ? `<img src="${data.foto}" class="scan-img mb-2"></img>`:''}

            <div class="result-item">
                <div class="result-label">Kode Barcode</div>
                <div class="result-value">${data.kode_barcode}</div>
            </div>

            <div class="result-item">
                <div class="result-label">Nama Barang</div>
                <div class="result-value">${data.nama_barang}</div>
            </div>

            <div class="result-item">
                <div class="result-label">Lokasi</div>
                <div class="result-value">${data.lokasi ?? '-'}</div>
            </div>

            <div class="result-item">
                <div class="result-label">Kondisi</div>
                <div class="result-value">${data.kondisi ?? '-'}</div>
            </div>
        `;
    } else {
        el.classList.add("error");

        el.innerHTML = `
            <div class="result-placeholder">
                ❌ ${data}
            </div>
        `;
    }
}

/* =========================
   SOUND EFFECT
========================= */
function playBeep() {
    const beep = new Audio("https://www.soundjay.com/buttons/beep-07.mp3");
    beep.play();
}

/* =========================
   TRANSLATE SCANNER UI
========================= */
function translateScannerUI() {
    const reader = document.getElementById("reader");
    if (!reader) return;

    const translations = {
        "Scan an Image File": "Pilih File Gambar",
        "Request Camera Permissions": "Izinkan Akses Kamera",
        "Permission denied": "Izin akses kamera ditolak. Silakan izinkan akses kamera di pengaturan browser, lalu muat ulang halaman.",
        "NotFoundError: Requested device not found" : "Perangkat yang diminta tidak ditemukan",
        "Choose Image - No image choosen" : "Pilih Gambar - Tidak ada gambar yang dipilih",
        "Or drop an image to scan" : "Atau jatuhkan gambar untuk dipindai",
        "Scan using camera directly" : "Pindai langsung lewat kamera"
    };

    const walker = document.createTreeWalker(reader, NodeFilter.SHOW_TEXT);
    const textNodes = [];
    let node;

    while (node = walker.nextNode()) {
        textNodes.push(node);
    }

    textNodes.forEach(textNode => {
        let text = textNode.nodeValue;

        Object.entries(translations).forEach(([english, indonesian]) => {
            text = text.replaceAll(english, indonesian);
        });

        if (text !== textNode.nodeValue) {
            textNode.nodeValue = text;
        }
    });
}

function customizeScannerUI() {
    const reader = document.getElementById("reader");
    if (!reader) return;

    const observer = new MutationObserver(translateScannerUI);
    observer.observe(reader, { childList: true, subtree: true });
    translateScannerUI();
}

/* =========================
   INIT ON LOAD
========================= */
document.addEventListener("DOMContentLoaded", function () {
    initScanner();
    customizeScannerUI();
});