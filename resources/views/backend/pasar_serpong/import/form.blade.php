@include('backend.pasar_serpong.layout.header')

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
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardSerpong') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('importFormSerpong') }}">Upload Data</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body col-12">
                        <div class="my-2">
                            @if(session('success'))
                            <div style="color: green;">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session('error'))
                                <div style="color: red;">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('importDataSerpong') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="tanggal_input">Tanggal Input :</label>
                                    <input type="date" id="tanggal_input" name="tanggal_input" class="form-control"  required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="surveyor_id">Surveyor :</label>
                                    <input id="surveyor_id" class="form-control" value="{{ $pasars->user->name }}" disabled>
                                    <input type="hidden" name="surveyor_id" class="form-control" value="{{ $pasars->user->id }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="pasar_id">Pasar :</label>
                                    <input id="pasar_id" class="form-control" value="{{ $pasars->pasar->nama_pasar }}" disabled>
                                    <input type="hidden" name="pasar_id" class="form-control" value="{{ $pasars->pasar->id }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="file">Pilih Berkas Excel (.xlsx, .csv):</label>
                                    <input type="file" name="file" id="file" class="form-control"  required accept=".xlsx, .csv">
                                    @error('file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-pill btn-primary mt-3">Impor Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('backend.pasar_serpong.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>


