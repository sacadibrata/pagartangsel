@include('backend.admin.layout.header')

@include('backend.admin.layout.topbar')

@include('backend.admin.layout.navbar1')

@include('backend.admin.layout.navbar2')

@include('sweetalert::alert')

<main class="main-content-wrapper">
    <div class="container">
      <!-- row -->
      <div class="row mb-8">
        <div class="col-md-12">
            <div class="d-md-flex justify-content-between align-items-center">
                <!-- pageheader -->
                    <div>
                    <h2 style="text-transform: uppercase;">{{ $title }}</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Stock Product</li>
                        </ol>
                    </nav>
                    </div>
                    <!-- button -->
            </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-xl-12 col-12 mb-5">
          <!-- card -->
          <div class="card h-100 card-lg">
            <!-- card body -->
            <div class="card-body p-0">
                <!-- table -->
                <div class="table-responsive">
                    <table class="table" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product</th>
                                <th scope="col">Insert Stock</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $currentKategori = null;
                            @endphp
                            <?php $i = 1; ?>
                            @foreach ($komoditas as $komoditi)
                                @if ($komoditi->kategori->nama_kategori != $currentKategori)
                                    <tr>
                                        <td colspan="5"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                                    </tr>
                                    @php
                                        $currentKategori = $komoditi->kategori->nama_kategori;
                                    @endphp
                                @endif
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{ $komoditi->nama_komoditas }} ({{ $komoditi->satuan->nama_satuan }})</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $komoditi->id }}">
                                            <i class="align-middle me fas fa-fw fa-edit"></i>
                                        </button>
                                        @include('backend.admin.pendataanstok.stokJombangmodal')
                                    </td>
                                    <td>
                                        <a href="{{ route('pendataanStok.showAdminJombang', $komoditi->id) }}" class="btn btn-sm btn-pill btn-info"><i class="align-middle me fas fa-fw fa-file"></i></a>
                                    </td>
                                    <td>
                                        @if ($komoditi->hasInputStokToday()) <!-- Mengecek apakah sudah input hari ini -->
                                        <a class="btn btn-sm btn-success"><i class="bi bi-check2-square"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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


