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
                    <h2 style="text-transform: uppercase;">{{ $title }} {{ $pendataan[0]->nama_komoditas }}</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pendataanAll.indexJengkol') }}" class="text-inherit">List Price Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Price Product</li>
                        </ol>
                    </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('pendataanAll.indexJengkol') }}" class="btn btn-outline-secondary mb-2">Back to List Price</a>
                    </div>
            </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-xl-12 col-12 mb-5">
          <!-- card -->
          <div class="card h-100 card-lg">
            <div class=" px-6 py-6 ">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                    <!-- form -->
                  </div>
                </div>
              </div>
            <!-- card body -->
            <div class="card-body p-0">
                <!-- table -->
                <div class="table-responsive">
                    <table class="table" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pedagang 1</th>
                                <th>Pedagang 2</th>
                                <th>Pedagang 3</th>
                                <th>Rata-Rata</th>
                                <th>Perbandingan Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($pendataan as $key => $data)
                                <tr>
                                    <td>{{ $i}}</td>
                                    <td>{{ $data->tanggal_input }}</td>
                                    <td>{{ number_format($data->harga_pedagang_1, 0, ',', '.') }}</td>
                                    <td>{{ number_format($data->harga_pedagang_2, 0, ',', '.') }}</td>
                                    <td>{{ number_format($data->harga_pedagang_3, 0, ',', '.') }}</td>
                                    <td>{{ number_format($data->average_harga, 0, ',', '.')  }}</td>
                                    <td>
                                        @if ($key > 0)
                                        @php
                                            $hargaKemarin = $pendataan[$key - 1];
                                            $hargaHariIni = $data;
                                            $perbandingan = ($hargaHariIni->average_harga > $hargaKemarin->average_harga)
                                            ? 'Naik'
                                            : ($hargaHariIni->average_harga < $hargaKemarin->average_harga ? 'Turun' : 'Tetap');
                                        @endphp

                                        @if ($perbandingan === 'Naik')
                                        <span class="btn btn-sm btn-danger">{{ $perbandingan }}</span>
                                        @elseif ($perbandingan === 'Turun')
                                        <span class="btn btn-sm btn-success">{{ $perbandingan }}</span>
                                        @else
                                        <span class="btn btn-sm btn-info">{{ $perbandingan }}</span>
                                        @endif
                                    @else
                                        -
                                    @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('pendataanAll.destroyJengkol', $data->id_pendataan) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{ $pendataan[0]->nama_komoditas }}?')"><i class="bi bi-trash"></i></button>
                                        </form>
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

