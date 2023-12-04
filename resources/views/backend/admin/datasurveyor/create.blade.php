@include('backend.admin.layout.header')

@include('backend.admin.layout.sidebar')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                FORM TAMBAH {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('datasurveyor.create') }}">Form Tambah Surveyor</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    @if ($errors->any())
                    <div class="card-header">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                <strong>
                                    <?php $i = 1; ?>
                                        @foreach ($errors -> all() as $item)
                                        {{$i}}. {{$item}}
                                        @endforeach
                                    <?php $i++ ?>
                                </strong>
                            </div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     </div>
                    @endif

                    <div class="card-header">
                        <a class="btn btn-pill btn-sm btn-secondary" href="{{ route('datasurveyor.index') }}"> Kembali </a>
                    </div>
                    <div class="card-body">
                        <form action='{{ url('backend/admin/datasurveyor') }}' method='post' id="validation-form">
                            @csrf
                            <div class="mb-3 error-placeholder">
                                <label class="form-label" for="user_id">Nama Surveyor</label>
                                <div class="d-flex">
                                    <select class="form-control" name="user_id" id="user" style="width: 100%">
                                        <option value="">Pilih Surveyor</option>
                                        @foreach($surveyorUsers as $surveyorUser)
                                        <option value="{{ $surveyorUser->id }}">{{ $surveyorUser->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 error-placeholder">
                                <label class="form-label" for="kota_id">Kota</label>
                                <div class="d-flex">
                                    <select class="form-control" name="kota_id" id="kota" style="width: 100%">
                                        <option value="">Pilih Kota</option>
                                        @foreach($kotas as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama_kota }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Kecamatan</label>
                                <div class="d-flex">
                                    <select name="kecamatan_id" id="kecamatan" class="form-control">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Pasar</label>
                                <div class="d-flex">
                                    <select name="pasar_id" id="pasar" class="form-control">
                                        <option value="">Pilih Pasar</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-pill btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kota').on('change', function() {
            var kota_id = $(this).val();
            if (kota_id) {
                $.ajax({
                    url: '/get-kecamatan/' + kota_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#kecamatan').empty();
                        $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('#kecamatan').append('<option value="' + value.id + '">' + value.nama_kec + '</option>');
                        });
                    }
                });
            } else {
                $('#kecamatan').empty();
                $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#kecamatan').on('change', function() {
            var kecamatan_id = $(this).val();
            if (kecamatan_id) {
                $.ajax({
                    url: '/get-pasar/' + kecamatan_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#pasar').empty();
                        $('#pasar').append('<option value="">Pilih Pasar</option>');
                        $.each(data, function(key, value) {
                            $('#pasar').append('<option value="' + value.id + '">' + value.nama_pasar + '</option>');
                        });
                    }
                });
            } else {
                $('#pasar').empty();
                $('#pasar').append('<option value="">Pilih Pasar</option>');
            }
        });
    });
</script>

@include('backend.admin.layout.footer')
