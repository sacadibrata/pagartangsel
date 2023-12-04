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
                        <h2>Add New Distributor</h2>
                            <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('distributor.index') }}" class="text-inherit">Distributors</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Distributor</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('distributor.index') }}" class="btn btn-outline-secondary mb-2">Back to Distributors</a>
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
                        <form action='{{ route('distributor.store') }}' method='POST' enctype="multipart/form-data">
                            @csrf
                            <h4 class="mb-4 h5 mt-5">Distributor Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Category Name</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="kategori_id" style="width: 100%">
                                            <option value>Choose Categories</option>
                                            @foreach ($distributors as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Distributor Name ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Address ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Telp</label>
                                    <input type="text" class="form-control" name="telepon" placeholder="Telp ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Alamat Web</label>
                                    <input type="text" class="form-control" name="url" placeholder="Alamat Web ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" placeholder="Latitude ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Longitude</label>
                                    <input type="text" class="form-control" name="longitude" placeholder="Longitude ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Upload Logo Distributor</label>
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
        $('#search').on('input', function() {
            var searchValue = $(this).val();
            $.get('{{ route('kategori.index') }}', { search: searchValue }, function(data) {
                // Memperbarui isi tabel yang ada dengan hasil pencarian
                $('#table-responsive tbody').html(data);
            });
        });
    });
</script>


