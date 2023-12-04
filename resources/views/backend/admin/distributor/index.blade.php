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
              <h2>Distributors</h2>
               <!-- breacrumb -->
               <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Distributors</li>
                </ol>
              </nav>
            </div>
            <!-- button -->
            <div>
              <a href="{{ route('distributor.create') }}" class="btn btn-outline-primary mb-2">Add New Distributor</a>
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
                <table id="example" class="display nowrap" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Name Category</th>
                            <th>Detail</th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($distributors as $item)
                        <tr>
                            <td>{{$i}}.</td>
                            <td>{{$item->nama_kategori}}</td>
                            <td>
                                <a href="{{ route('distributor.show', $item->id) }}" class="btn btn-sm btn-info"><i class="bi bi-info-circle"></i></a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form onsubmit="return confirm('Anda yakin ingin menghapus data kategori {{ $item->nama_kategori }}?')" class="d-inline" method="POST" action="{{ route('satuan.destroy', $item->id) }}">
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


