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
                        <h2>Add New City</h2>
                            <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('kota.index') }}" class="text-inherit">City</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New City</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('kota.index') }}" class="btn btn-outline-secondary mb-2">Back to City</a>
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
                        <form action='{{ route('kota.store') }}' method='POST'>
                            @csrf
                            <h4 class="mb-4 h5 mt-5">City Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">City Name</label>
                                    <input type="text" class="form-control" placeholder="Unit Name" name="nama_kota"  required>
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


