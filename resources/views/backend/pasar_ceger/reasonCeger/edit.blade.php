@include('backend.admin.layout.header')

@include('backend.admin.layout.sidebar')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                FORM EDIT {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{url('backend/admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"style="text-transform: capitalize;"><a href="{{url('backend/admin/kecamatan/'.$data->id.'/edit')}}">Form Edit Kecamatan</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    @if ($errors->any())
                    <div class="card-header">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                <strong>
                                    <?php $i = 1; ?>
                                        @foreach ($errors -> all() as $item)
                                        {{$i}}. {{$item}}
                                        @endforeach
                                    <?php $i++ ?>
                                </strong>
                            </div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     </div>
                    @endif
                    <div class="card-header">
                        <a class="btn btn-pill btn-sm btn-secondary" href="{{ route('kecamatan.index') }}"> Kembali </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kecamatan.update',$data->id) }}" method='post' id="validation-form">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Kota</label>
                                <div class="d-flex">
                                    <select class="form-control" name="kota_id" style="width: 100%">
                                        <option value>Pilih Kota</option>
                                        @foreach ($kota as $k)
                                        <option value="{{ $k->id }}" {{ $k->id == $data->kota_id ? 'selected' : '' }}>
                                            {{ $k->nama_kota }}
                                        </option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Nama Kecamatan</label>
                                <input type="text" class="form-control" name="nama_kec" placeholder="Nama Kecamatan ..." value="{{$data->nama_kec}}">
                            </div>
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Longitude</label>
                                <input type="text" class="form-control" name="longitude" placeholder="Isi Longitude ..." value="{{$data->longitude}}">
                            </div>
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Latitude</label>
                                <input type="text" class="form-control" name="latitude" placeholder="Isi Latitude" value="{{$data->latitude}}">
                            </div>
                            <button type="submit" class="btn btn-pill btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#category_id').change(function () {
            var categoryId = $(this).val();
            $.ajax({
                url: '/get-subcategories/' + categoryId,
                type: 'GET',
                success: function (data) {
                    $('#subcategory_id').empty();
                    $.each(data.subcategories, function (key, value) {
                        $('#subcategory_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@include('backend.admin.layout.footer')
