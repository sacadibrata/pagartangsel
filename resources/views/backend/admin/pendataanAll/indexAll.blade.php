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
            <h1 class="header-title">
                 {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pendataanAll.index') }}">Input Harga</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tabelharga.index') }}">Tabel Harga</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('grafik.index') }}">Grafik Harga</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Import File</h5>
                        <h6 class="card-subtitle text-muted">
                            <a href="{{ route('importFormAll') }}"
                                target="_blank" rel="noopener noreferrer nofollow" class="btn btn-pill btn-secondary">Click Here</a>.
                        </h6>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="25%">Komoditas</th>
                                    <th width="5%" style="text-align: center">Satuan</th>
                                    <th width="3%" style="text-align: center">Input</th>
                                    <th width="3%" style="text-align: center">Detail</th>
                                    <th width="20%" style="text-align: center">Info</th>
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
                                            <td colspan="6"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                                        </tr>
                                        @php
                                            $currentKategori = $komoditi->kategori->nama_kategori;
                                        @endphp
                                    @endif
                                    <tr>
                                        <td>{{$i}}.</td>
                                        <td>{{ $komoditi->nama_komoditas }}</td>
                                        <td style="text-align: center">{{ $komoditi->satuan->nama_satuan }}</td>
                                        <td>

                                            <!-- BEGIN primary modal -->
                                            <button type="button" class="btn btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $komoditi->id }}">
                                                <i class="align-middle me fas fa-fw fa-edit"></i>
                                            </button>
                                            <div class="modal fade" id="defaultModalPrimary{{ $komoditi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah Harga Komoditas</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body ">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title mb-0">Harga {{ $komoditi->nama_komoditas }} Per {{ $komoditi->satuan->nama_satuan }} Hari Ini</h5>
                                                                    <h5 class="card-title mb-0"></h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="{{ route('pendataanAll.store', $komoditi->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md">
                                                                            <div class="mb-0">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-text">
                                                                                     Surveyor :
                                                                                    </div>
                                                                                    <input type="text" class="form-control" value="{{ $pasar->user->name }}" disabled>
                                                                                    <input type="hidden" name="komoditas_id" value="{{ $komoditi->id }}">
                                                                                    <input type="hidden" name="surveyor_id" class="form-control" value="{{ $pasar->user->id }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md">
                                                                            <div class="mb-0">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-text">

                                                                                    </div>
                                                                                    <input type="text" class="form-control" value="{{ $pasar->pasar->nama_pasar }}" disabled>
                                                                                    <input type="hidden" name="pasar_id" class="form-control" value="{{ $pasar->pasar->id }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="row mt-4">
                                                                        <div class="col-md">
                                                                            <div class="mb-0">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-text">
                                                                                     Tanggal Input
                                                                                    </div>
                                                                                    <input type="date" class="form-control" name="tanggal_input" class="form-control" required>
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
                                                                            <div class="mb-0">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-text">
                                                                                     Pedagang 1 :
                                                                                    </div>
                                                                                    <input type="number" name="harga_pedagang_1" class="form-control" id="harga_pedagang_1_{{ $komoditi->id }}">
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
                                                                            <div class="mb-0">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-text">
                                                                                     Pedagang 2 :
                                                                                    </div>
                                                                                    <input type="number" name="harga_pedagang_2" class="form-control" id="harga_pedagang_2_{{ $komoditi->id }}">
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
                                                                            <div class="mb-0">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-text">
                                                                                     Pedagang 3 :
                                                                                    </div>
                                                                                    <input type="number" name="harga_pedagang_3" class="form-control" id="harga_pedagang_3_{{ $komoditi->id }}">
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
                                                                            <div class="mb-0">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-text">
                                                                                     Rata-Rata :
                                                                                    </div>
                                                                                    <input type="number" name="average_harga" class="form-control" id="average_harga_{{ $komoditi->id }}" readonly>
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
                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                <script>
                                                    $(document).ready(function() {

                                                        $('#harga_pedagang_1_{{ $komoditi->id }}, #harga_pedagang_2_{{ $komoditi->id }}, #harga_pedagang_3_{{ $komoditi->id }}').change(function() {
                                                            var harga1 = parseFloat($('#harga_pedagang_1_{{ $komoditi->id }}').val()) || 0;
                                                            var harga2 = parseFloat($('#harga_pedagang_2_{{ $komoditi->id }}').val()) || 0;
                                                            var harga3 = parseFloat($('#harga_pedagang_3_{{ $komoditi->id }}').val()) || 0;

                                                            var rataRata = (harga1 + harga2 + harga3) / 3;

                                                            $('#average_harga_{{ $komoditi->id }}').val(rataRata.toFixed(2));
                                                        });
                                                    });
                                                </script>
                                        </td>
                                        <td>
                                            <a href="{{ route('pendataanAll.show', $komoditi->id) }}" class="btn btn-pill btn-info"><i class="align-middle me fas fa-fw fa-file"></i></a>
                                        </td>
                                        <td style="text-align: center">
                                            @if ($komoditi->hasInputToday()) <!-- Mengecek apakah sudah input hari ini -->
                                            <a class="btn btn-pill btn-warning"><i class="align-middle me fas fa-fw fa-check-circle"></i></a>

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


