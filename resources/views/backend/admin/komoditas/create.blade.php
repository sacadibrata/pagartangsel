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
                        <h2>Add New Product</h2>
                            <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('komoditas.index') }}" class="text-inherit">Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('komoditas.index') }}" class="btn btn-outline-secondary mb-2">Back to Products</a>
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
                        <form action='{{ route('komoditas.store') }}' method='POST' enctype="multipart/form-data">
                            @csrf
                            <h4 class="mb-4 h5 mt-5">Product Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Category Name</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="kategori_id" style="width: 100%">
                                            <option value>Choose Categories</option>
                                            @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Units Name</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="satuan_id" style="width: 100%">
                                            <option value>Choose Units</option>
                                            @foreach ($satuan as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama_satuan }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Nama Komoditas</label>
                                    <input type="text" class="form-control" name="nama_komoditas" placeholder="Category Name ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Upload Pict</label>
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


