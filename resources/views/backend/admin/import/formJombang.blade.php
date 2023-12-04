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
                        <h2>{{ $title }}</h2>
                            <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('pendataanAll.indexJombang') }}" class="text-inherit">List Price Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Price</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('pendataanAll.indexJombang') }}" class="btn btn-outline-secondary mb-2">Back to List Price</a>
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
                        <form action="{{ route('importDataPsJombang') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="mb-4 h5 mt-5">Price Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label for="tanggal_input">Date:</label>
                                    <input type="date" id="tanggal_input" name="tanggal_input" class="form-control"  required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Markets</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="pasar_id" id="pasar_jombang" style="width: 100%">
                                            <option value="">Choose</option>
                                            @foreach($pasars as $pasar)
                                            <option value="{{ $pasar->id }}">{{ $pasar->nama_pasar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Surveyor</label>
                                    <div class="d-flex">
                                        <select name="surveyor_id" id="surveyor_jombang" class="form-control">
                                            <option value="">Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label for="file">Choose Excel Doc (.xlsx, .csv):</label>
                                    <input type="file" name="file" id="file" class="form-control"  required accept=".xlsx, .csv">
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
<script>
    $(document).ready(function() {
        $('#pasar_jombang').on('change', function() {
            var pasar_jombang = $(this).val();
            if (pasar_jombang) {
                $.ajax({
                    url: '/get-surveyor-jombang/' + pasar_jombang,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#surveyor_jombang').empty();
                        $('#surveyor_jombang').append('<option value="">Choose ...</option>');
                        $.each(data, function(key, value) {
                            $('#surveyor_jombang').append('<option value="' + value.id_surveyor + '">' + value.nama_user + '</option>');
                        });
                    }
                });
            } else {
                $('#surveyor_jombang').empty();
                $('#surveyor_jombang').append('<option value="">Choose ...</option>');
            }
        });
    });
</script>
