console.log("Dashboard loaded");

// ===========================
// LINE CHART (Scan Harian)
// ===========================

const lineCtx = document.getElementById('scanChart');

if (lineCtx) {
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: window.scanLabels || [],
            datasets: [{
                label: 'Jumlah Scan',
                data: window.scanData || [],
                borderColor: 'blue',
                backgroundColor: 'rgba(0,0,255,0.2',
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// ============================
// BAR CHART (Statistik)
// ============================

const barCtx = document.getElementById('barChart');

if (barCtx) {
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Total Aset', 'Total Scan', 'Scan Hari Ini'],
            datasets: [{
                label: 'Statistik Sistem',
                data: [
                    window.totalAset || 0,
                    window.totalScan || 0,
                    window.scanHariIni || 0
                ],
                backgroundColor: ['green', 'blue', 'orange']
            }]
        },
        options: {
            reponsive: true
        }
    })
}