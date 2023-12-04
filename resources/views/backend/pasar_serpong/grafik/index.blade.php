@include('backend.pasar_serpong.layout.header')

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
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardSerpong') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanPsSerpong.index') }}">Input Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('tabelhargaserpong.index') }}">Tabel Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('grafikserpong.index') }}">Grafik Harga</a></li>
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
                                <th scope="col">Aksi</th>

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
                                    <td>{{ $komoditi->satuan->nama_satuan }}</td>
                                    <td>
                                        <a href="{{ route('grafikserpong.tampil', $komoditi->id) }}" class="btn btn-pill btn-info">Lihat Grafik</a>
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

@include('backend.pasar_serpong.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>



