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
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('exportFormPilihTanggalAll') }}">Laporan Harga Harian</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body col-12">
                        <div class="my-2">
                            <form action="{{ route('exportLaporanHargaPilihTanggalAll') }}" method="GET">
                                @csrf
                                <label for="start_date">Tanggal Mulai:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                                <label class="mt-3" for="end_date">Tanggal Akhir:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                                <button type="submit" class="btn btn-pill btn-info mt-2" >Export Data</button>
                            </form>
                        </div>
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


