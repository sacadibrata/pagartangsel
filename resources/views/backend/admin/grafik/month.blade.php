@include('backend.admin.layout.header')

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
            <h1 class="header-title">
                 {{ $title }} {{ $pendataan[0]->nama_komoditas }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('pendataanAll.index') }}">Input Harga</a></li>
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('tabelharga.index') }}">Tabel Harga</a></li>
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('grafik.index') }}">Grafik Harga</a></li>
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('grafik.tampil', $pendataan[0]->id_komoditas) }}">Grafik Harga {{ $pendataan[0]->nama_komoditas }}</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
           <!-- resources/views/harga_produk/chart.blade.php -->

            <canvas id="myChart"></canvas>

            <script src="{{ asset('node_modules/chart.js/dist/Chart.min.js') }}"></script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');

                var labels = {!! json_encode($data->pluck('date')->unique()) !!};
                var datasets = [];

                {!! $data->pluck('nama_komoditas')->unique()->map(function($productName) use($data) {
                    return "datasets.push({
                        label: '$productName',
                        data: " . $data->where('nama_produk', $productName)->pluck('avg_price')->toJson() . ",
                        borderColor: getRandomColor(),
                        fill: false,
                    });";
                })->implode('') !!}

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day',
                                    displayFormats: {
                                        day: 'MMM D'
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Date'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Price'
                                }
                            }
                        }
                    }
                });

                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }
            </script>

        </div>
    </div>
</main>

@include('backend.admin.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>



