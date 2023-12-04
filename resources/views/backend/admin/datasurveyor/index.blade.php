@include('backend.admin.layout.header')

@include('backend.admin.layout.sidebar')

@include('sweetalert::alert')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                 {{ $title }} DI KOTA TANGERANG SELATAN
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('datasurveyor.index') }}">Daftar Surveyor</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-pill btn-sm btn-secondary" href="{{ route('datasurveyor.create') }}"> Tambah </a>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Surveyor</th>
                                    <th>Pasar</th>
                                    <th>Kecamatan</th>
                                    <th>Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                    @foreach ($surveyor as $item)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->pasar->nama_pasar}}</td>
                                    <td>{{ $item->kecamatan->nama_kec }}</td>
                                    <td>{{$item->kota->nama_kota}}</td>
                                    <td>
                                        <a class="btn btn-pill btn-success btn-sm" href="{{ route('datasurveyor.edit',$item->id) }}"><i class="fas fa-edit"></i></a>
                                        <form onsubmit="return confirm('Anda yakin ingin menghapus data {{$item->user->name}}?')" class="d-inline" method="POST" action="{{ route('datasurveyor.destroy',$item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-pill btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
