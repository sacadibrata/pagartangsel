@include('backend.pasar_ciputat.layout.header')

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
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardCiputat') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('alasanCiputat.index') }}">Input Penyebab Kenaikan Harga</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Komoditas</th>
                                <th scope="col">Harga Kemarin (Rp)</th>
                                <th scope="col">Harga Hari Ini (Rp)</th>
                                <th scope="col">Perubahan (Rp)</th>
                                <th scope="col">Note</th>
                                <th scope="col">Penyebab Kenaikan</th>
                                <th scope="col">Input Penyebab Kenaikan</th>
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
                                        <td colspan="9"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                                    </tr>
                                    @php
                                        $currentKategori = $komoditi->kategori->nama_kategori;
                                    @endphp
                                @endif
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{ $komoditi->nama_komoditas }} ({{ $komoditi->satuan->nama_satuan }})</td>

                                    <td>
                                        @php
                                        $hargaKemarin = null;
                                        @endphp
                                        @foreach ($komoditi->pendataanciputat as $hargaBarang)
                                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                @php
                                                    $hargaKemarin = $hargaBarang->average_harga;
                                                @endphp
                                                {{ number_format($hargaKemarin, 0, ',', '.') }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                         {{-- You can fetch the "Harga Hari Ini" here --}}
                                        @php
                                        $hargaHariIni = null;
                                        @endphp
                                        @foreach ($komoditi->pendataanciputat as $hargaBarang)
                                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                @php
                                                    $hargaHariIni = $hargaBarang->average_harga;
                                                @endphp
                                                {{ number_format($hargaHariIni, 0, ',', '.') }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- Calculate and display the perubahan (change) --}}
                                        @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                @php
                                                    $perubahan = $hargaHariIni - $hargaKemarin;
                                                @endphp
                                            {{ number_format($perubahan, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if ($perubahan > 0)
                                                <span class="btn btn-pill btn-danger">Naik</span>
                                            @elseif ($perubahan < 0)
                                                <span class="btn btn-pill btn-success">Turun</span>
                                            @else
                                                <span class="btn btn-pill btn-secondary">Tetap</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($alasan as $k)
                                            @if ($k->komoditas_id == $komoditi->id)
                                                {{ $k->nama_alasan }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $komoditi->id }}">
                                            <i class="align-middle me fas fa-fw fa-edit"></i>
                                        </button>

                                        <div class="modal fade" id="defaultModalPrimary{{ $komoditi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Input Penyebab Kenaikan Harga Komoditas {{ $komoditi->nama_komoditas }} Per {{ $komoditi->satuan->nama_satuan }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form action="{{ route('alasanCiputat.store', $komoditi->id) }}" method="POST">
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
                                                                                <input class="form-control" name="tanggal_input" class="form-control" value="{{ Carbon\Carbon::today()->format('Y-m-d') }}" readonly>
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
                                                                    @php
                                                                    $hargaKemarin = null;
                                                                    @endphp
                                                                    @foreach ($komoditi->pendataanciputat as $hargaBarang)
                                                                        @if ($hargaBarang->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                                            @php
                                                                                $hargaKemarin = $hargaBarang->average_harga;
                                                                            @endphp

                                                                        @endif
                                                                    @endforeach
                                                                    <div class="col-md">
                                                                        <div class="mb-0">
                                                                            <div class="input-group">
                                                                                <div class="input-group-text">
                                                                                 Harga Kemarin :
                                                                                </div>
                                                                                <input type="number" name="hargaKemarin" class="form-control" value="{{ number_format($hargaKemarin, 0, ',', '.') }}" readonly>
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
                                                                    @php
                                                                    $hargaHariIni = null;
                                                                    @endphp
                                                                    @foreach ($komoditi->pendataanciputat as $hargaBarang)
                                                                        @if ($hargaBarang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                            @php
                                                                                $hargaHariIni = $hargaBarang->average_harga;
                                                                            @endphp

                                                                        @endif
                                                                    @endforeach
                                                                    <div class="col-md">
                                                                        <div class="mb-0">
                                                                            <div class="input-group">
                                                                                <div class="input-group-text">
                                                                                 Harga Hari Ini :
                                                                                </div>
                                                                                <input type="number" name="hargaHariIni" class="form-control" value="{{ number_format($hargaHariIni, 0, ',', '.') }}" readonly>
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
                                                                    @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                        @php
                                                                             $perubahan = $hargaHariIni - $hargaKemarin;
                                                                        @endphp
                                                                    @else
                                                                        -
                                                                    @endif
                                                                    <div class="col-md">
                                                                        <div class="mb-0">
                                                                            <div class="input-group">
                                                                                <div class="input-group-text">
                                                                                 Perubahan :
                                                                                </div>
                                                                                <input type="number" name="perubahanHarga" class="form-control" value="{{ number_format($perubahan, 0, ',', '.') }}" readonly>
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
                                                                                    <label class="form-label">Alasan Kenaikan Harga Komoditas :</label>
                                                                                </div>
                                                                                <select class="form-control" name="reason_id">
                                                                                    <option value>Pilih Penyebab Kenaikan Harga</option>
                                                                                    @foreach ($komoditass as $k)
                                                                                        @foreach ($k->reasonCiputat as $reason)
                                                                                            @if ($reason->komoditas_id == $komoditi->id)
                                                                                                <option value="{{ $reason->id }}">{{ $reason->nama_alasan }}</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endforeach
                                                                                </select>
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
</main>

@include('backend.pasar_ciputat.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>



