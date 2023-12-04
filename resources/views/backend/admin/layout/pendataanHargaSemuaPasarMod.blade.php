<div class="modal fade gd-example-modal-md" id="defaultModalPrimary{{ $komoditi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rata-Rata Harga Komoditas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Harga {{ $komoditi->nama_komoditas }} Per {{ $komoditi->satuan->nama_satuan }} Hari Ini</h5>
                        <h5 class="card-title mb-0"></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pendataanAll.storeSemuaPasar', $komoditi->id) }}" method="POST">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-md">
                                <div class="mb-0">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            Surveyor :
                                        </div>
                                        <input type="text" class="form-control" value="{{ $pasar->user->name }}" disabled>
                                        <input type="hidden" name="komoditas_id" value="{{ $komoditi->id }}">
                                        <input type="hidden" name="surveyor_id" class="form-control" value="{{ $pasar->user->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md">
                                <div class="mb-0">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            Pasar :
                                        </div>
                                        <input type="text" class="form-control" value="{{ $pasar->pasar->nama_pasar }}" disabled>
                                        <input type="hidden" name="pasar_id" class="form-control" value="{{ $pasar->pasar->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="col-md">
                                <div class="mb-0">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            Tanggal Input
                                        </div>
                                        <input type="date" class="form-control" name="tanggal_input" class="form-control" value="{{ Carbon\Carbon::now()->subDay(55)->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md">
                                @php
                                $hargaHariIniSerpong = null;
                                @endphp
                                @foreach ($komoditi->pendataanserpong as $hargaBarangSerpong)
                                    @if ($hargaBarangSerpong->tanggal_input == Carbon\Carbon::now()->subDay(55)->format('Y-m-d'))
                                        @php
                                            $hargaHariIniSerpong = $hargaBarangSerpong->average_harga;
                                        @endphp
                                        <div class="mb-0">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    Pasar Serpong :
                                                </div>
                                                <input type="number" class="form-control" value="{{ $hargaHariIniSerpong }}" id="pendataan_ps_serpongs_id_{{ $komoditi->id }}" disabled>
                                                <input type="hidden" name="pendataan_ps_serpongs_id" class="form-control"  value="{{ $hargaBarangSerpong->id }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md">
                                @php
                                $hargaHariIniCiputat = null;
                                @endphp
                                @foreach ($komoditi->pendataanciputat as $hargaBarangCiputat)
                                    @if ($hargaBarangCiputat->tanggal_input == Carbon\Carbon::now()->subDay(55)->format('Y-m-d'))
                                        @php
                                            $hargaHariIniCiputat = $hargaBarangCiputat->average_harga;
                                        @endphp
                                        <div class="mb-0">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    Pasar Ciputat :
                                                </div>
                                                <input type="number" class="form-control" value="{{ $hargaHariIniCiputat }}" id="pendataan_ps_ciputats_id_{{ $komoditi->id }}" disabled>
                                                <input type="hidden" name="pendataan_ps_ciputats_id" class="form-control"  value="{{ $hargaBarangCiputat->id }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md">
                                @php
                                $hargaHariIniJengkol = null;
                                @endphp
                                @foreach ($komoditi->pendataanjengkol as $hargaBarangJengkol)
                                    @if ($hargaBarangJengkol->tanggal_input == Carbon\Carbon::now()->subDay(55)->format('Y-m-d'))
                                        @php
                                            $hargaHariIniJengkol = $hargaBarangJengkol->average_harga;
                                        @endphp
                                        <div class="mb-0">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    Pasar Jengkol :
                                                </div>
                                                <input type="number" class="form-control" value="{{ $hargaHariIniJengkol }}" id="pendataan_ps_jengkols_id_{{ $komoditi->id }}" disabled>
                                                <input type="hidden" name="pendataan_ps_jengkols_id" class="form-control"  value="{{ $hargaBarangJengkol->id }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md">
                                @php
                                $hargaHariIniCeger = null;
                                @endphp
                                @foreach ($komoditi->pendataanceger as $hargaBarangCeger)
                                    @if ($hargaBarangCeger->tanggal_input == Carbon\Carbon::now()->subDay(55)->format('Y-m-d'))
                                        @php
                                            $hargaHariIniCeger = $hargaBarangCeger->average_harga;
                                        @endphp
                                        <div class="mb-0">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    Pasar Ceger :
                                                </div>
                                                <input type="number" class="form-control" value="{{ $hargaHariIniCeger }}" id="pendataan_ps_cegers_id_{{ $komoditi->id }}" disabled>
                                                <input type="hidden" name="pendataan_ps_cegers_id" class="form-control"  value="{{ $hargaBarangCeger->id }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md">
                                @php
                                $hargaHariIniCimanggis = null;
                                @endphp
                                @foreach ($komoditi->pendataancimanggis as $hargaBarangCimanggis)
                                    @if ($hargaBarangCimanggis->tanggal_input == Carbon\Carbon::now()->subDay(55)->format('Y-m-d'))
                                        @php
                                            $hargaHariIniCimanggis = $hargaBarangCimanggis->average_harga;
                                        @endphp
                                        <div class="mb-0">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    Pasar Cimanggis :
                                                </div>
                                                <input type="number" class="form-control" value="{{ $hargaHariIniCimanggis }}" id="pendataan_ps_cimanggis_id_{{ $komoditi->id }}" disabled>
                                                <input type="hidden" name="pendataan_ps_cimanggis_id" class="form-control"  value="{{ $hargaBarangCimanggis->id }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md">
                                @php
                                $hargaHariIniJombang = null;
                                @endphp
                                @foreach ($komoditi->pendataanjombang as $hargaBarangJombang)
                                    @if ($hargaBarangJombang->tanggal_input == Carbon\Carbon::now()->subDay(55)->format('Y-m-d'))
                                        @php
                                            $hargaHariIniJombang = $hargaBarangJombang->average_harga;
                                        @endphp
                                        <div class="mb-0">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    Pasar Jombang :
                                                </div>
                                                <input type="number" class="form-control" value="{{ $hargaHariIniJombang }}" id="pendataan_ps_jombangs_id_{{ $komoditi->id }}" disabled>
                                                <input type="hidden" name="pendataan_ps_jombangs_id" class="form-control"  value="{{ $hargaBarangJombang->id }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md">
                                <div class="mb-0">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            Rata-Rata :
                                           </div>
                                           <input type="number" name="average_harga" class="form-control" id="average_harga_{{ $komoditi->id }}" readonly>
                                    </div>
                                </div>
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
