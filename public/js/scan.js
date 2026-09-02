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
   CUSTOMIZE BUTTON TEXT
========================= */
function customizeScannerUI() {
    setTimeout(() => {
        const permissionBtn = document.querySelector("#reader button");
        if (permissionBtn) {
            permissionBtn.innerText = "Izinkan Akses Kamera";
        }
    }, 500);
}

/* =========================
   INIT ON LOAD
========================= */
document.addEventListener("DOMContentLoaded", function () {
    initScanner();
    customizeScannerUI();
});