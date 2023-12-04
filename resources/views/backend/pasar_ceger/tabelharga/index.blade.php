@include('backend.pasar_ceger.layout.header')

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
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardCeger') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanPsCeger.index') }}">Input Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('tabelhargaceger.index') }}">Tabel Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('grafikceger.index') }}">Grafik Harga</a></li>
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
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Kemarin</th>
                                <th scope="col">Harga Hari ini</th>
                                <th scope="col">Perubahan (Rp)</th>
                                <th scope="col">Perubahan (%)</th>
                                <th scope="col">Note</th>
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
                                        <td colspan="8"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
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
                                        @php
                                        $hargaKemarin = null;
                                        @endphp
                                        @foreach ($komoditi->pendataanceger as $hargaBarang)
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
                                        @foreach ($komoditi->pendataanceger as $hargaBarang)
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
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Calculate and display the perubahan in percentage --}}
                                        @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                            @php
                                                $perubahanPercentage = ($perubahan / $hargaKemarin) * 100;
                                            @endphp
                                            {{ number_format($perubahanPercentage, 2, ',', '.') }}%
                                    </td>
                                    <td>
                                            @if ($perubahan > 0)
                                            <span class="badge text-bg-danger"><i class="fa-solid fa-arrow-up"></i></span>
                                            @elseif ($perubahan < 0)
                                            <span class="badge text-bg-success"><i class="fa-solid fa-arrow-down"></i></span>
                                            @else
                                            <span class="badge text-bg-secondary"><i class="fa-solid fa-equals"></i></span>
                                            @endif
                                        @else
                                            -
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
</main>

@include('backend.pasar_ceger.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>



