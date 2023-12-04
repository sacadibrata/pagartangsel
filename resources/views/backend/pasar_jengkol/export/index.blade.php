@include('backend.pasar_jengkol.layout.header')

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
                {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardJengkol') }}">Dasboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('exportJengkol.index') }}">Laporan Harga Komoditas</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Silakan Unduh Laporan Harga</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Laporan Perubahan Harga Harian</td>
                                    <td>
                                        <form action="{{ route('exportLaporanPerubahanHargaJengkol') }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-pill btn-secondary mt-2" >Download Data</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laporan Harga Harian</td>
                                    <td>
                                        <form action="{{ route('exportLaporanHargaHarianJengkol') }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-pill btn-secondary mt-2" >Download Data</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laporan Monitoring Pengawasan Inflasi Daerah</td>
                                    <td>
                                        <form action="{{ route('exportLaporanMonitoringPengawasanInflasiJengkol') }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-pill btn-secondary mt-2" >Download Data</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('backend.pasar_jengkol.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>


