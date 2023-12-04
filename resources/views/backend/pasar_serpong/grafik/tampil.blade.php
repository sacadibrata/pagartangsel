@include('backend.pasar_ciputat.layout.header')

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

<div class="wrapper">
		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">

			</nav>

@include('sweetalert::alert')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title"style="text-transform: uppercase;">
                 {{ $title }} {{ $pendataan[0]->nama_komoditas }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardSerpong') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanPsSerpong.index') }}">Input Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('tabelhargaserpong.index') }}">Tabel Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('grafikserpong.index') }}">Grafik Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('grafikserpong.tampil', $pendataan[0]->id_komoditas) }}">Grafik Harga {{ $pendataan[0]->nama_komoditas }}</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                @php
                $perbandinganData = [];
                $perbandingan = []; // Initialize the $perbandingan array
                foreach($pendataan as $key => $data) {
                    if ($key > 0) {
                        $hargaKemarin = $pendataan[$key - 1];
                        $hargaHariIni = $data;
                        $perbandingan[] = ($hargaHariIni->average_harga > $hargaKemarin->average_harga)
                            ? 'Naik'
                            : ($hargaHariIni->average_harga < $hargaKemarin->average_harga ? 'Turun' : 'Tetap');
                    } else {
                        $perbandingan[] = '-'; // Handle the first element
                    }

                    $perbandinganData[] = [
                        'tanggal_input' => $data->tanggal_input,
                        'average_harga' => $data->average_harga,
                        'perbandingan' => $perbandingan[$key] // Use the calculated value
                    ];
                }
                @endphp
<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data perbandingan dari PHP ke dalam JavaScript
    const perbandinganData = @json($perbandinganData);

    // Ambil elemen canvas
    const ctx = document.getElementById('myChart').getContext('2d');

    // Siapkan data untuk grafik
    const labels = perbandinganData.map(data => data.tanggal_input);
    const rataRataHariIni = perbandinganData.map(data => data.average_harga);
    const perbandinganTeks = perbandinganData.map(data => data.perbandingan);



    // Buat warna untuk label berdasarkan perbandingan
    const colors = perbandinganTeks.map(perbandingan => {
        if (perbandingan === 'Naik') {
            return 'red';
        } else if (perbandingan === 'Turun') {
            return 'green';
        } else {
            return 'blue';
        }
    });

    // Buat objek grafik
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Rata-Rata Harga',
                data: rataRataHariIni,
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Rata-Rata Harga'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                annotation: {
                    annotations: {
                        drawTime: 'beforeDraw', // Menambahkan label sebelum menggambar grafik
                        annotations: [] // Label akan ditambahkan di sini
                    }
                }
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        const index = tooltipItem.dataIndex;
                        return `Perbandingan: ${perbandinganTeks[index]}`;
                    }
                }
            }
        }
    });

// Tambahkan label di tengah-tengah garis
const addLabelsToChart = () => {
    const annotationPlugin = myChart.getPlugin('annotation');
    perbandinganTeks.forEach((perbandingan, index) => {
        if (perbandingan === 'Naik' || perbandingan === 'Turun' || perbandingan === 'Tetap') {
            annotationPlugin.addAnnotation({
                type: 'line',
                mode: 'vertical',
                scaleID: 'x',
                value: labels[index],
                borderColor: 'black',
                borderWidth: 1,
                label: {
                    content: perbandingan,
                    enabled: true,
                    position: 'top'
                }
            });
        }
    });
    myChart.update();
};

addLabelsToChart();

</script>

<style>
    .label-red {
        color: red;
    }

    .label-green {
        color: green;
    }

    .label-blue {
        color: blue;
    }
</style>
            </div>
        </div>
    </div>
</main>

@include('backend.pasar_ciputat.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>



