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
                {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}">Dasboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('exportAll.index') }}">Laporan Harga Komoditas</a></li>
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
                                        <form action="{{ route('exportLaporanPerubahanHargaAll') }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-pill btn-secondary mt-2" >Download Data</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laporan Harga Harian</td>
                                    <td>
                                        <form action="{{ route('exportLaporanHargaHarianAll') }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-pill btn-secondary mt-2" >Download Data</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pilih Pasar</td>
                                    <td>
                                        <form method="GET" action="{{ route('filterByPasar') }}">
                                            @csrf
                                            <label for="pasar_id">Pilih Pasar:</label>
                                            <select name="pasar_id" id="pasar_id">
                                                <!-- Isi dropdown dengan daftar pasar yang sesuai -->
                                                @foreach($pasarOptions as $pasarOption)
                                                    <option value="{{ $pasarOption->id }}">{{ $pasarOption->nama_pasar }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </form>
                                        @if(isset($filteredData))
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Komoditas ID</th>
                                                        <th>Average Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($filteredData as $data)
                                                        <tr>
                                                            <td>{{ $data->komoditas_id }}</td>
                                                            <td>{{ $data->average_harga }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
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

@include('backend.admin.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>


