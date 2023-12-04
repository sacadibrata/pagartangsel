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
            <h1 class="header-title" style="text-transform: uppercase;">
                 {{ $title }} {{ $pendataan[0]->nama_komoditas }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanPsSerpong.index') }}">Input Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanPsSerpong.show', $pendataan[0]->id_komoditas) }}">Detail Komoditas</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
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
                                            <span class="btn btn-pill btn-danger">{{ $perbandingan }}</span>
                                            @elseif ($perbandingan === 'Turun')
                                            <span class="btn btn-pill btn-success">{{ $perbandingan }}</span>
                                            @else
                                            <span class="btn btn-pill btn-info">{{ $perbandingan }}</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('pendataanPsSerpong.destroy', $data->id_pendataan) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-pill btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{ $pendataan[0]->nama_komoditas }}?')"><i class="align-middle me fas fa-fw fa-trash-alt"></i></button>
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


