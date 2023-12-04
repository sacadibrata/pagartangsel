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
                    <h2 style="text-transform: uppercase;">{{ $title }} {{ $profil[0]->nama_pasar }}</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="text-inherit">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil.index') }}" class="text-inherit">List Markets Name</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('profil.index') }}" class="btn btn-outline-secondary mb-2">Back to List</a>
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
                    <table class="table table-borderless" style="width:100%">
                        <tbody>
                            <tr>
                                <td><a href="{{ asset('pasar/' . $profil[0]->gambar) }}" target="_blank"><img src="{{ asset('pasar/' . $profil[0]->gambar) }}" alt="Gambar Pasar" width="35%"></a></td>
                            </tr>
                                <tr>
                                    <td><b>Sejarah Pendirian Pasar :</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $profil[0]->sejarah }}</td>
                                </tr>
                                <tr>
                                    <td><b>Alamat Pasar :</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $profil[0]->alamat }}</td>
                                </tr>
                                <tr>
                                    <td><b>Jam Operasional :</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $profil[0]->jam }}</td>
                                </tr>
                                <tr>
                                    <td><b>Luas Pasar :</b></td>
                                </tr>
                                <tr>
                                    <td>memiliki luas lahan {{ $profil[0]->luas }} m²</td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Kios/ Los :</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        Kios : {{ $profil[0]->kios }} Unit<br>
                                        Los : {{ $profil[0]->los }} Unit
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Jenis barang yang diperdagangkan :</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $profil[0]->jenisBarang }}</td>
                                </tr>

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

