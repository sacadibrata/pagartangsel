@include('backend.admin.layout.header')

@include('backend.admin.layout.topbar')

@include('backend.admin.layout.navbar1')

@include('backend.admin.layout.navbar2')

@include('sweetalert::alert')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title" style="text-transform: uppercase;">
                 {{ $title }} {{ $pendataan[0]->nama_komoditas }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanStok.indexAdminCiputat') }}">Input Harga</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('pendataanStok.showAdminCiputat', $pendataan[0]->id_komoditas) }}">Detail Komoditas</a></li>
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
                                    <th>Perbandingan Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($pendataan as $key => $data)
                                    <tr>
                                        <td>{{ $i}}</td>
                                        <td>{{ $data->tanggal_input }}</td>
                                        <td>{{ number_format($data->stok_pedagang_1, 0, ',', '.') }} {{ $data->nama_satuan }}</td>
                                        <td>{{ number_format($data->stok_pedagang_2, 0, ',', '.') }} {{ $data->nama_satuan }}</td>
                                        <td>{{ number_format($data->stok_pedagang_3, 0, ',', '.') }} {{ $data->nama_satuan }}</td>
                                        <td>{{ number_format($data->average_stok, 0, ',', '.')  }} {{ $data->nama_satuan }}</td>
                                        <td>
                                            @if ($key > 0)
                                            @php
                                                $stokKemarin = $pendataan[$key - 1];
                                                $stokHariIni = $data;
                                                $perbandingan = ($stokHariIni->average_stok > $stokKemarin->average_stok)
                                                ? 'Naik'
                                                : ($stokHariIni->average_stok < $stokKemarin->average_stok ? 'Turun' : 'Tetap');
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
                                            <form action="{{ route('pendataanStok.destroyAdminCiputat', $data->id_pendataan) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-pill btn-danger" onclick="return confirm('Anda yakin ingin menghapus data stok {{ $pendataan[0]->nama_komoditas }}?')"><i class="align-middle me fas fa-fw fa-trash-alt"></i></button>
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

@include('backend.admin.layout.footer')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
   new DataTable('#example', {
    responsive: true
});
</script>


