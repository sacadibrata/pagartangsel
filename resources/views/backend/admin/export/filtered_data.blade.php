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
                                    <td>Pilih Pasar</td>
                                    <td>
                                        <form method="POST" action="{{ route('filterByPasar') }}">
                                            @csrf
                                            <label for="komoditas_id">Pilih Komoditi :</label>
                                            <select name="komoditas_id" id="komoditas_id">
                                                <option value="">Pilih Komoditi</option>
                                                @foreach($komoditas as $komoditi)
                                                    <option value="{{ $komoditi->id }}">{{ $komoditi->nama_komoditas }}</option>
                                                @endforeach
                                            </select>
                                            <label for="tanggal_input">Tanggal Input:</label>
                                            <input type="date" name="tanggal_input" id="tanggal_input">
                                            <button type="submit">Filter</button>
                                        </form>

                                        @if(isset($filteredData))
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Pasar</th>
                                                        <th>Harga Rata-Rata</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($filteredData as $data)
                                                        <tr>
                                                            <td>{{ $data->nama_pasar }}</td>
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


