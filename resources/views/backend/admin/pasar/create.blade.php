@include('backend.admin.layout.header')

@include('backend.admin.layout.topbar')

@include('backend.admin.layout.navbar1')

@include('backend.admin.layout.navbar2')

@include('sweetalert::alert')

<main class="main-content-wrapper">
    <!-- container -->
    <div class="container">
            <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                    <div>
                        <h2>Add New Markets</h2>
                            <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('pasar.index') }}" class="text-inherit">Markets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Markets</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('pasar.index') }}" class="btn btn-outline-secondary mb-2">Back to Markets</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <!-- card -->
                <div class="card mb-6 shadow border-0">
                    <!-- card body -->
                    <div class="card-body p-6 ">
                        <form action='{{ route('pasar.store') }}' method='POST' enctype="multipart/form-data">
                            @csrf
                            <h4 class="mb-4 h5 mt-5">Markets Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Markets Name</label>
                                    <input type="text" class="form-control" name="nama_pasar" placeholder="Markets Name ...">
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">City</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="kota_id" id="kota" style="width: 100%">
                                            <option value>Choose...</option>
                                            @foreach($kotas as $category)
                                                <option value="{{ $category->id }}">{{ $category->nama_kota }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Kecamatan</label>
                                    <div class="d-flex">
                                        <select name="kecamatan_id" id="kecamatan" class="form-control">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Longitude</label>
                                    <input type="text" class="form-control" name="longitude" placeholder="Input Longitude ...">
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" placeholder="Input Latitude ...">
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Upload Foto Pasar</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-outline-primary mb-2">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('backend.admin.layout.footer')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
   new DataTable('#example', {
    responsive: true
});
</script>
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


