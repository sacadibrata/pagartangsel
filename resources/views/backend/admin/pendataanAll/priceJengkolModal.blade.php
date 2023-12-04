<div class="modal fade" id="defaultModalPrimary{{ $komoditi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Harga {{ $komoditi->nama_komoditas }} Per {{ $komoditi->satuan->nama_satuan }} Hari Ini</h5>
                        <h5 class="card-title mb-0"></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pendataanAll.storeCeger', $komoditi->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md">
                                <div class="mb-0">
                                    <div class="input-group">
                                        <select class="form-control" name="pasar_id" id="semuaPasar{{ $komoditi->id }}" style="width: 100%">
                                            <option value="">Pilih Pasar</option>
                                            @foreach($pasars as $pasar)
                                            <option value="{{ $pasar->id }}">{{ $pasar->nama_pasar }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="komoditas_id" value="{{ $komoditi->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-0">
                                    <div class="input-group">
                                        <select name="surveyor_id" id="surveyorSemuaPasar{{ $komoditi->id }}" class="form-control">
                                            <option value="">Pilih Surveyor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_input" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="input-group">
                                <input type="number" name="harga_pedagang_1" class="form-control" id="harga_pedagang_1_{{ $komoditi->id }}" placeholder="harga Pedagang 1">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="input-group">
                                <input type="number" name="harga_pedagang_2" class="form-control" id="harga_pedagang_2_{{ $komoditi->id }}" placeholder="harga Pedagang 2">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="input-group">
                                <input type="number" name="harga_pedagang_3" class="form-control" id="harga_pedagang_3_{{ $komoditi->id }}" placeholder="harga Pedagang 3">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="input-group">
                                <input type="number" name="average_harga" class="form-control" id="average_harga_{{ $komoditi->id }}" readonly placeholder="Rata-Rata harga Pedagang">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#harga_pedagang_1_{{ $komoditi->id }}, #harga_pedagang_2_{{ $komoditi->id }}, #harga_pedagang_3_{{ $komoditi->id }}').change(function() {
                var harga1 = parseFloat($('#harga_pedagang_1_{{ $komoditi->id }}').val()) || 0;
                var harga2 = parseFloat($('#harga_pedagang_2_{{ $komoditi->id }}').val()) || 0;
                var harga3 = parseFloat($('#harga_pedagang_3_{{ $komoditi->id }}').val()) || 0;

                var rataRata ;

                if (harga1 !== 0 && harga2 === 0 && harga3 === 0) {
                    rataRata = harga1;
                } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0) {
                    rataRata = harga2;
                } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0) {
                    rataRata = harga3;
                } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0) {
                    rataRata = (harga1 + harga2) / 2;
                } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0) {
                    rataRata = (harga2 + harga3) / 2;
                } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0) {
                    rataRata = (harga1 + harga3) / 2;
                } else {
                    // Jika tidak ada kondisi di atas yang terpenuhi, hitung rata-rata normal
                    rataRata = (harga1 + harga2 + harga3) / 3;
                }

                // Melakukan pembulatan ke atas
                rataRata = Math.ceil(rataRata);

                $('#average_harga_{{ $komoditi->id }}').val(rataRata.toFixed(2));
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#semuaPasar{{ $komoditi->id }}').on('change', function() {
                var semuaPasar{{ $komoditi->id }} = $(this).val();
                if (semuaPasar{{ $komoditi->id }}) {
                    $.ajax({
                        url: '/get-surveyor-semua-pasar/' + semuaPasar{{ $komoditi->id }},
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#surveyorSemuaPasar{{ $komoditi->id }}').empty();
                            $('#surveyorSemuaPasar{{ $komoditi->id }}').append('<option value="">Pilih Surveyor</option>');
                            $.each(data, function(key, value) {
                                $('#surveyorSemuaPasar{{ $komoditi->id }}').append('<option value="' + value.id_surveyor + '">' + value.nama_user + '</option>');
                            });
                        }
                    });
                } else {
                    $('#surveyorSemuaPasar{{ $komoditi->id }}').empty();
                    $('#surveyorSemuaPasar{{ $komoditi->id }}').append('<option value="">Pilih Surveyor</option>');
                }
            });
        });
    </script>


