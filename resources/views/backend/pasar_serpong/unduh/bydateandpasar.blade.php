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
                    <li class="breadcrumb-item"><a href="{{url('backend/admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{url('backend/admin/pendataan')}}">Input Harga</a></li>
                    <li class="breadcrumb-item"><a href="{{url('backend/admin/tabelharga')}}">Tabel Harga</a></li>
                    <li class="breadcrumb-item"><a href="{{url('backend/admin/grafik')}}">Grafik Harga</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header col-3">                    
                    <form action="{{ route('bydateandpasar') }}" method="GET">
                        <div class="form-group mt-3">
                            <label for="tanggal">Filter Tanggal:</label>
                             <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="pasar_id">Filter Pasar:</label>
                            <select name="pasar_id" class="form-control" id="pasar_id">
                                <option value="">Pilih Pasar</option>
                                @foreach ($pasars as $kec)
                                    <option value="{{ $kec->id }}">{{ $kec->nama_pasar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Filter</button>
                    </form>                  
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Komoditas</th>
                                <th>Satuan</th>
                                <th>Pedagang 1</th>
                                <th>Pedagang 2</th>
                                <th>Pedagang 3</th>
                                <th>Rata-Rata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $currentKategori = null;
                            @endphp
                            <?php $i = 1; ?>
                            @foreach ($pendataans as $pendataan)
                                @if ($pendataan->komoditas->kategori->nama_kategori != $currentKategori)
                                    <tr>
                                        <td colspan="5"><strong>{{ $pendataan->komoditas->kategori->nama_kategori }}</strong></td>
                                    </tr>
                                    @php
                                        $currentKategori = $pendataan->komoditas->kategori->nama_kategori;
                                    @endphp
                                @endif            
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{ $pendataan->komoditas->nama_komoditas }}</td>                    
                                    <td>{{ $pendataan->komoditas->satuan->nama_satuan }}</td>
                                    <td>
                                        {{ number_format($pendataan->harga_pedagang_1, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ number_format($pendataan->harga_pedagang_2, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ number_format($pendataan->harga_pedagang_3, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ number_format($pendataan->average_harga, 0, ',', '.') }}
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

@include('backend.admin.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>



