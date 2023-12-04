@include('backend.admin.layout.header')

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

<div class="wrapper">
		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">

			</nav>

@include('sweetalert::alert')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title" style="text-transform: uppercase;">
                 {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanAll.indexSemuaPasar') }}">Input Harga</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!--<h5 class="card-title">Import File</h5>
                        <h6 class="card-subtitle text-muted">
                            <a href="{{ route('importFormAll') }}"
                                target="_blank" rel="noopener noreferrer nofollow" class="btn btn-pill btn-secondary">Click Here</a>.
                        </h6> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Komoditas</th>
                                        <th scope="col">Input</th>
                                        <th scope="col">Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $currentKategori = null;
                                    @endphp
                                    <?php $i = 1; ?>
                                    @foreach ($resumeHargaPasar as $komoditi)
                                        @if ($komoditi->kategori->nama_kategori != $currentKategori)
                                            <tr>
                                                <td colspan="6"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                                            </tr>
                                            @php
                                                $currentKategori = $komoditi->kategori->nama_kategori;
                                            @endphp
                                        @endif
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td>{{ $komoditi->nama_komoditas }} ({{ $komoditi->satuan->nama_satuan }})</td>
                                            <td>
                                                <!-- BEGIN primary modal -->
                                                <button type="button" class="btn btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#resumeHarga{{ $komoditi->id }}">
                                                    <i class="align-middle me fas fa-fw fa-edit"></i>
                                                </button>
                                                <div class="modal fade" id="resumeHarga{{ $komoditi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Rata-Rata Harga Komoditas</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body ">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title">Harga {{ $komoditi->nama_komoditas }} Per {{ $komoditi->satuan->nama_satuan }} Hari Ini</h5>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="card-body">
                                                                        <form action="{{ route('pendataanAll.storeResumeHargaPasar', $komoditi->id) }}" method="POST">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-md">
                                                                                <div class="mb-0">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-text">
                                                                                            Tanggal Input
                                                                                        </div>
                                                                                        <input type="date" class="form-control" name="tanggal_input" class="form-control" value="{{ Carbon\Carbon::today()->format('Y-m-d') }}" required>
                                                                                        <input type="hidden" name="komoditas_id" value="{{ $komoditi->id }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md">
                                                                                <div class="mb-0">
                                                                                    <div class="input-group">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-4">
                                                                            <div class="col-md">
                                                                                @php
                                                                                $hargaHariIniSerpong = null;
                                                                                @endphp
                                                                                @foreach ($komoditi->pendataanserpong as $hargaBarangSerpong)
                                                                                    @if ($hargaBarangSerpong->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                                        @php
                                                                                            $hargaHariIniSerpong = $hargaBarangSerpong->average_harga;
                                                                                        @endphp
                                                                                        <div class="mb-0">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-text">
                                                                                                    Pasar Serpong :
                                                                                                </div>
                                                                                                <input type="number" class="form-control" value="{{ $hargaHariIniSerpong }}" id="pendataan_ps_serpongs_id_{{ $komoditi->id }}" disabled>
                                                                                                <input type="hidden" name="pendataan_ps_serpongs_id" class="form-control"  value="{{ $hargaBarangSerpong->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="col-md">
                                                                                @php
                                                                                $hargaHariIniCiputat = null;
                                                                                @endphp
                                                                                @foreach ($komoditi->pendataanciputat as $hargaBarangCiputat)
                                                                                    @if ($hargaBarangCiputat->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                                        @php
                                                                                            $hargaHariIniCiputat = $hargaBarangCiputat->average_harga;
                                                                                        @endphp
                                                                                        <div class="mb-0">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-text">
                                                                                                    Pasar Ciputat :
                                                                                                </div>
                                                                                                <input type="number" class="form-control" value="{{ $hargaHariIniCiputat }}" id="pendataan_ps_ciputats_id_{{ $komoditi->id }}" disabled>
                                                                                                <input type="hidden" name="pendataan_ps_ciputats_id" class="form-control"  value="{{ $hargaBarangCiputat->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md">
                                                                                @php
                                                                                $hargaHariIniJengkol = null;
                                                                                @endphp
                                                                                @foreach ($komoditi->pendataanjengkol as $hargaBarangJengkol)
                                                                                    @if ($hargaBarangJengkol->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                                        @php
                                                                                            $hargaHariIniJengkol = $hargaBarangJengkol->average_harga;
                                                                                        @endphp
                                                                                        <div class="mb-0">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-text">
                                                                                                    Pasar Jengkol :
                                                                                                </div>
                                                                                                <input type="number" class="form-control" value="{{ $hargaHariIniJengkol }}" id="pendataan_ps_jengkols_id_{{ $komoditi->id }}" disabled>
                                                                                                <input type="hidden" name="pendataan_ps_jengkols_id" class="form-control"  value="{{ $hargaBarangJengkol->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="col-md">
                                                                                @php
                                                                                $hargaHariIniCeger = null;
                                                                                @endphp
                                                                                @foreach ($komoditi->pendataanceger as $hargaBarangCeger)
                                                                                    @if ($hargaBarangCeger->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                                        @php
                                                                                            $hargaHariIniCeger = $hargaBarangCeger->average_harga;
                                                                                        @endphp
                                                                                        <div class="mb-0">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-text">
                                                                                                    Pasar Ceger :
                                                                                                </div>
                                                                                                <input type="number" class="form-control" value="{{ $hargaHariIniCeger }}" id="pendataan_ps_cegers_id_{{ $komoditi->id }}" disabled>
                                                                                                <input type="hidden" name="pendataan_ps_cegers_id" class="form-control"  value="{{ $hargaBarangCeger->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md">
                                                                                @php
                                                                                $hargaHariIniCimanggis = null;
                                                                                @endphp
                                                                                @foreach ($komoditi->pendataancimanggis as $hargaBarangCimanggis)
                                                                                    @if ($hargaBarangCimanggis->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                                        @php
                                                                                            $hargaHariIniCimanggis = $hargaBarangCimanggis->average_harga;
                                                                                        @endphp
                                                                                        <div class="mb-0">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-text">
                                                                                                    Pasar Cimanggis :
                                                                                                </div>
                                                                                                <input type="number" class="form-control" value="{{ $hargaHariIniCimanggis }}" id="pendataan_ps_cimanggis_id_{{ $komoditi->id }}" disabled>
                                                                                                <input type="hidden" name="pendataan_ps_cimanggis_id" class="form-control"  value="{{ $hargaBarangCimanggis->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="col-md">
                                                                                @php
                                                                                $hargaHariIniJombang = null;
                                                                                @endphp
                                                                                @foreach ($komoditi->pendataanjombang as $hargaBarangJombang)
                                                                                    @if ($hargaBarangJombang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                                        @php
                                                                                            $hargaHariIniJombang = $hargaBarangJombang->average_harga;
                                                                                        @endphp
                                                                                        <div class="mb-0">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-text">
                                                                                                    Pasar Jombang :
                                                                                                </div>
                                                                                                <input type="number" class="form-control" value="{{ $hargaHariIniJombang }}" id="pendataan_semua_pasars_id_{{ $komoditi->id }}" disabled>
                                                                                                <input type="hidden" name="pendataan_ps_jombangs_id" class="form-control"  value="{{ $hargaBarangJombang->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-md">
                                                                                @php
                                                                                $hargaHariIniSemuaPasar = null;
                                                                                @endphp
                                                                                @foreach ($komoditi->pendataansemuapasar as $hargaBarangSemuaPasar)
                                                                                    @if ($hargaBarangSemuaPasar->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                                        @php
                                                                                            $hargaHariIniSemuaPasar = $hargaBarangSemuaPasar->average_harga;
                                                                                        @endphp
                                                                                        <div class="mb-0">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-text">
                                                                                                    Harga Rata-Rata
                                                                                                </div>
                                                                                                <input type="number" class="form-control" value="{{ $hargaHariIniSemuaPasar }}" id="pendataan_semua_pasars_id_{{ $komoditi->id }}" disabled>
                                                                                                <input type="hidden" name="pendataan_semua_pasars_id" class="form-control"  value="{{ $hargaBarangSemuaPasar->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-3">
                                                                            <button type="button" class="btn btn-pill btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-pill btn-primary">Simpan</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                @if ($komoditi->hasInputToday()) <!-- Mengecek apakah sudah input hari ini -->
                                                <a class="btn btn-pill btn-success"><i class="align-middle me fas fa-fw fa-check-circle"></i></a>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>


