@include('backend.pasar_jombang.layout.header')

@include('backend.pasar_jombang.layout.sidebar')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                FORM TAMBAH {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('dashboardJombang') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a href="{{ route('reason.create') }}">Form Tambah Penyebab Kenaikan Harga</a></li>
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
                        <a class="btn btn-pill btn-sm btn-secondary" href="{{ route('reason.index') }}"> Kembali </a>
                    </div>
                    <div class="card-body">
                        <form action='{{ route('reason.store') }}' method='POST' id="validation-form">
                            @csrf
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Komoditas</label>
                                <div class="d-flex">
                                    <select class="form-control" name="komoditas_id" style="width: 100%">
                                        <option value>Pilih Komoditas</option>
                                        @foreach ($komoditas as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_komoditas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Penyebab Kenaikan Harga</label>
                                <input type="text" class="form-control" name="nama_alasan" placeholder="Nama Alasan ...">
                            </div>
                            <button type="submit" class="btn btn-pill btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('backend.pasar_jombang.layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Select2 select box
			$("select[name=\"komoditas_id\"]").select2({
				allowClear: true,
				placeholder: "Pilih Komoditas...",
			}).change(function() {
				$(this).valid();
			});

        // Initialize validation
        $("#validation-form").validate({
            ignore: ".ignore, .select2-input",
            focusInvalid: false,
            rules: {
                "nama_alasan": {
                    required: true
                },
                "validation-checkbox-group-1": {
                    require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                },
                "validation-checkbox-group-2": {
                    require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                },
                "validation-checkbox-group-1": {
                    require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                },
                "validation-checkbox-group-2": {
                    require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                }
            },
            // Errors
            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents(".error-placeholder");
                // Do not duplicate errors
                if ($parent.find(".jquery-validation-error").length) {
                    return;
                }
                $parent.append(
                    error.addClass("jquery-validation-error small form-text invalid-feedback")
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents(".error-placeholder");
                $el.addClass("is-invalid");
                // Select2 and Tagsinput
                if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                    $el.parent().addClass("is-invalid");
                }
            },
            unhighlight: function(element) {
                $(element).parents(".error-placeholder").find(".is-invalid").removeClass("is-invalid");
            }
        });
    });
</script>
