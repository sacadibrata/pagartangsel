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
                        <h2>Add New Profile Markets</h2>
                            <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profil.index') }}" class="text-inherit">Profile Markets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Profile Market</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('profil.index') }}" class="btn btn-outline-secondary mb-2">Back to Profile Markets</a>
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
                        <form action='{{ route('profil.store') }}' method='POST'>
                            @csrf
                            <h4 class="mb-4 h5 mt-5">Markets Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Markets Name</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="pasar_id" style="width: 100%">
                                            <option value>Choose Markets Name</option>
                                            @foreach ($profils as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_pasar }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Sejarah Pasar</label>
                                    <textarea class="form-control" name="sejarah" placeholder="Sejarah Pasar ..." required></textarea>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Alamat Pasar</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat Pasar ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Jam Operasional Pasar</label>
                                    <input type="text" class="form-control" name="jam" placeholder="Jam Operasional Pasar ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Luas Pasar</label>
                                    <input type="text" class="form-control" name="luas" placeholder="Luas Pasar ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Jumlah Kios Pasar</label>
                                    <input type="text" class="form-control" name="kios" placeholder="Kios Pasar ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Jumlah Los Pasar</label>
                                    <input type="text" class="form-control" name="los" placeholder="Los Pasar ..." required>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Jenis Barang yang Diperdagangkan</label>
                                    <input type="text" class="form-control" name="jenisBarang" placeholder="Barang yang Diperdagangkan ..." required>
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


