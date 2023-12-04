    <!-- section -->
    <div class="mt-2">
        <div class="container">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-7 mb-3">
                    <div class="card shadow p-0">
                        <div class="card-body">
                            <div class="mb-4">
                                <!-- breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home.indexFrontend') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('tabelpasar.indexHarga6Pasar') }}">Tabel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Harga 6 Pasar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <div class="container">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-7 mb-3">
                    <div class="card shadow p-0">
                        <div class="card-body">
                            <div>
                                <h4><span><center>Harga Komoditas di 6 Pasar Pantau Tanggal {{ Carbon\Carbon::today()->locale('id')->isoFormat('DD MMMM YYYY') }}</center></span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-7 mb-4 mt-1">
                    <div class="card border-2 shadow">
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Komoditas</th>
                                                <th>Pasar Ceger</th>
                                                <th>Pasar Cimanggis</th>
                                                <th>Pasar Ciputat</th>
                                                <th>Pasar Jengkol</th>
                                                <th>Pasar Jombang</th>
                                                <th>Pasar Serpong</th>
                                                <th>Rata-Rata</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $currentKategori = null;
                                            @endphp
                                            <?php $i = 1; ?>
                                            <?php $c = 1; ?>
                                            @foreach ($komoditas as $komoditi)
                                                @if ($komoditi->kategori->nama_kategori != $currentKategori)
                                                    <tr>
                                                        <td><strong>{{$c}}.</strong></td>
                                                        <td colspan="8"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                                                    </tr>
                                                    @php
                                                        $currentKategori = $komoditi->kategori->nama_kategori;
                                                    @endphp
                                                <?php $c++ ?>
                                                @endif

                                                <tr>
                                                    <td>{{$i}}.</td>
                                                    <td>{{ $komoditi->nama_komoditas }} / ({{ $komoditi->satuan->nama_satuan }})</td>
                                                    <td>
                                                       @php
                                                       $hargaHariIni = null;
                                                       @endphp
                                                       @foreach ($komoditi->pendataanceger as $hargaBarangCeger)
                                                           @if ($hargaBarangCeger->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                               @php
                                                                   $hargaHariIni = $hargaBarangCeger->average_harga;
                                                               @endphp
                                                               {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                           @endif
                                                       @endforeach
                                                   </td>
                                                   <td>
                                                        @php
                                                        $hargaHariIni = null;
                                                        @endphp
                                                        @foreach ($komoditi->pendataancimanggis as $hargaBarangCimanggis)
                                                            @if ($hargaBarangCimanggis->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                @php
                                                                    $hargaHariIni = $hargaBarangCimanggis->average_harga;
                                                                @endphp
                                                                    {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                       @php
                                                       $hargaHariIni = null;
                                                       @endphp
                                                       @foreach ($komoditi->pendataanciputat as $hargaBarangCiputat)
                                                           @if ($hargaBarangCiputat->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                               @php
                                                                   $hargaHariIni = $hargaBarangCiputat->average_harga;
                                                               @endphp
                                                                {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                           @endif
                                                       @endforeach
                                                   </td>
                                                   <td>
                                                        @php
                                                        $hargaHariIni = null;
                                                        @endphp
                                                        @foreach ($komoditi->pendataanjengkol as $hargaBarangJengkol)
                                                            @if ($hargaBarangJengkol->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                @php
                                                                    $hargaHariIni = $hargaBarangJengkol->average_harga;
                                                                @endphp
                                                                    {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                            @endif
                                                        @endforeach
                                                   </td>
                                                    <td>
                                                        @php
                                                        $hargaHariIni = null;
                                                        @endphp
                                                        @foreach ($komoditi->pendataanjombang as $hargaBarangJombang)
                                                            @if ($hargaBarangJombang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                @php
                                                                    $hargaHariIni = $hargaBarangJombang->average_harga;
                                                                @endphp
                                                                 {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @php
                                                        $hargaHariIni = null;
                                                        @endphp
                                                        @foreach ($komoditi->pendataanserpong as $hargaBarangSerpong)
                                                            @if ($hargaBarangSerpong->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                @php
                                                                    $hargaHariIni = $hargaBarangSerpong->average_harga;
                                                                @endphp
                                                                 {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @php
                                                        $hargaHariIni = null;
                                                        @endphp
                                                        @foreach ($komoditi->pendataansemuapasar as $hargaBarangSemuaPasar)
                                                            @if ($hargaBarangSemuaPasar->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                @php
                                                                    $hargaHariIni = $hargaBarangSemuaPasar->average_harga;
                                                                @endphp
                                                                 {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                            @endif
                                                        @endforeach
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
            </div>
        </div>


