@include('backend.pasar_cimanggis.layout.header')

@include('backend.pasar_cimanggis.layout.sidebar')

@include('sweetalert::alert')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                 {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('dashboardCimanggis') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{ route('reasonCimanggis.index') }}">Daftar Penyebab</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-pill btn-sm btn-secondary" href="{{ route('reasonCimanggis.create') }}"> Tambah </a>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Komoditas</th>
                                    <th>Penyebab Kenaikan Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                    @foreach ($komoditas as $item)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{$item->nama_komoditas}} ({{ $item->satuan->nama_satuan }})</td>
                                    <td>
                                        <ul>
                                            @foreach ($item->reasonCimanggis as $reason)
                                                <li>{{ $reason->nama_alasan }}</li>
                                            @endforeach
                                        </ul>
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

@include('backend.pasar_cimanggis.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
