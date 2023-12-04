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
              <h2>Products</h2>
               <!-- breacrumb -->
               <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
              </nav>
            </div>
            <!-- button -->
            <div>
              <a href="{{ route('komoditas.create') }}" class="btn btn-outline-primary mb-2">Add New Product</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-xl-12 col-12 mb-5">
          <!-- card -->
          <div class="card h-100 card-lg">
            <!-- card body -->
            <div class="card-body p-3">
                <!-- table -->
                <div class="table-responsive">
                    <table class="table" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Pict</th>
                                <th>Product</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $currentKategori = null;
                            @endphp
                            <?php $i = 1; ?>
                            @foreach ($komoditas as $key => $item)
                                @if ($item->kategori->nama_kategori != $currentKategori)
                                    <tr>
                                        <td colspan="5"><strong>{{ $item->kategori->nama_kategori }}</strong></td>
                                    </tr>
                                    @php
                                        $currentKategori = $item->kategori->nama_kategori;
                                    @endphp
                                @endif
                            <tr>
                                <td>{{$komoditas->firstItem() + $key}}.</td>
                                <td><a href="{{ asset('komoditas/' . $item->gambar) }}" target="_blank"><img src="{{ asset('komoditas/' . $item->gambar) }}" alt="Gambar {{ $item->id }}" width="100">
                                    </a>
                                </td>
                                <td>{{$item->nama_komoditas}}</td>
                                <td>{{$item->satuan->nama_satuan}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="feather-icon icon-more-vertical fs-5"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form onsubmit="return confirm('Anda yakin ingin menghapus data kategori {{ $item->nama_komoditas }}?')" class="d-inline" method="POST" action="{{ route('komoditas.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="dropdown-item" onclick="this.parentNode.submit(); return false;">
                                                        <i class="bi bi-trash me-3"></i>Hapus
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++ ?>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                        <span>Showing {{ $komoditas->firstItem() }} to {{ $komoditas->lastItem() }} of {{ $komoditas->total() }} entries</span>
                        <nav class="mt-2 mt-md-0">
                            <ul class="pagination mb-0">
                                @if ($komoditas->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $komoditas->previousPageUrl() }}">Previous</a></li>
                                @endif

                                @for ($i = 1; $i <= $komoditas->lastPage(); $i++)
                                    <li class="page-item {{ $i == $komoditas->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $komoditas->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($komoditas->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $komoditas->nextPageUrl() }}">Next</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
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

