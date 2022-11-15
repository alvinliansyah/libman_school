const ctx = document.getElementById('doughnut').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Jumlah Buku Di Perpustakaan', 'Jumlah Buku Tersedia Di Perpustakaan', 'Jumlah Buku Sedang Proses Peminjaman'],
        datasets: [{
            label: 'Chart Buku',
            data: [234, 465],
            backgroundColor: [
                'rgba(41, 155, 99, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderColor: [
                'rgba(41, 155, 99, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});