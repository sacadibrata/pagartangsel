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
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('importFormAll') }}">Upload Data</a></li>
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
                            <form action="{{ route('importDataAll') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="tanggal_input">Tanggal Input:</label>
                                    <input type="date" id="tanggal_input" name="tanggal_input" class="form-control"  required>
                                </div>
                                <div class="mt-3 error-placeholder">
                                    <label class="form-label">Pasar</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="pasar_id" id="semuaPasar" style="width: 100%">
                                            <option value="">Pilih Pasar</option>
                                            @foreach($pasars as $pasar)
                                            <option value="{{ $pasar->id }}">{{ $pasar->nama_pasar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3 error-placeholder">
                                    <label class="form-label">Surveyor</label>
                                    <div class="d-flex">
                                        <select name="surveyor_id" id="surveyorSemuaPasar" class="form-control">
                                            <option value="">Pilih Surveyor</option>
                                        </select>
                                    </div>
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

@include('backend.admin.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#semuaPasar').on('change', function() {
            var semuaPasar = $(this).val();
            if (semuaPasar) {
                $.ajax({
                    url: '/get-surveyor-semua-pasar/' + semuaPasar,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#surveyorSemuaPasar').empty();
                        $('#surveyorSemuaPasar').append('<option value="">Pilih Surveyor</option>');
                        $.each(data, function(key, value) {
                            $('#surveyorSemuaPasar').append('<option value="' + value.id_surveyor + '">' + value.nama_user + '</option>');
                        });
                    }
                });
            } else {
                $('#surveyorSemuaPasar').empty();
                $('#surveyorSemuaPasar').append('<option value="">Pilih Surveyor</option>');
            }
        });
    });
</script>


