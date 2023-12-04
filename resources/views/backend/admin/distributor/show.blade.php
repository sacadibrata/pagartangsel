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
            <div class="d-md-flex justify-content-between align-items-center">
                <!-- pageheader -->
                    <div>
                    <h2 style="text-transform: uppercase;">{{ $title }} {{ $distributors[0]->nama_kategori }}</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('distributor.index') }}" class="text-inherit">List Categories Name</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Distributors</li>
                        </ol>
                    </nav>
                    </div>
                    <!-- button -->

            </div>
            <!-- button -->
            <div>
                <a href="{{ route('distributor.index') }}" class="btn btn-outline-secondary mb-2">Back to List</a>
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
                            <th>Name Distributor</th>
                            <th>Address</th>
                            <th>Telp</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($distributors as $item)
                        <tr>
                            <td>{{$i}}.</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->telepon}}</td>
                            <td>{{$item->url}}</td>
                            <td>{{$item->latitude}}</td>
                            <td>{{$item->longitude}}</td>
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


