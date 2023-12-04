<h3 style="text-transform: uppercase;">LAPORAN HARGA HARIAN</h3>
<small>Per Tanggal {{ Carbon\Carbon::today()->format('d F Y') }}</small>
<h4 style="text-transform: uppercase;">Nama :  {{ $pasar->user->name }}</h4>
<h4 style="text-transform: uppercase;">Pasar :  {{ $pasar->pasar->nama_pasar }}</h4>

<div class="table-responsive">
    <table class="table mb-0">
        <thead>
            <tr>
                <th scope="col"><strong>No</strong></th>
                <th scope="col"><strong>Komoditas</strong></th>
                <th scope="col"><strong>Pasar Ceger</strong></th>
                <th scope="col"><strong>Pasar Cimanggis</strong></th>
                <th scope="col"><strong>Pasar Ciputat</strong></th>
                <th scope="col"><strong>Pasar Jengkol</strong></th>
                <th scope="col"><strong>Pasar Jombang</strong></th>
                <th scope="col"><strong>Pasar Serpong</strong></th>
                <th scope="col"><strong>Rata-Rata</strong></th>
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
                        <td><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                    </tr>
                    @php
                        $currentKategori = $komoditi->kategori->nama_kategori;
                    @endphp
                <?php $c++ ?>
                @endif

                <tr>
                    <td>{{$i}}.</td>
                    <td>{{ $komoditi->nama_komoditas }} ({{ $komoditi->satuan->nama_satuan }})</td>
                    <td>
                        {{-- You can fetch the "Harga Hari Ini" here --}}
                       @php
                       $hargaHariIni = null;
                       @endphp
                       @foreach ($komoditi->pendataanceger as $hargaBarangCeger)
                           @if ($hargaBarangCeger->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                               @php
                                   $hargaHariIni = $hargaBarangCeger->average_harga;
                               @endphp
                               {{ $hargaHariIni }}
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
                                    {{ $hargaHariIni }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{-- You can fetch the "Harga Hari Ini" here --}}
                       @php
                       $hargaHariIni = null;
                       @endphp
                       @foreach ($komoditi->pendataanciputat as $hargaBarangCiputat)
                           @if ($hargaBarangCiputat->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                               @php
                                   $hargaHariIni = $hargaBarangCiputat->average_harga;
                               @endphp
                                {{ $hargaHariIni }}
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
                                    {{ $hargaHariIni }}
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
                                 {{ $hargaHariIni }}
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
                                 {{ $hargaHariIni }}
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
                                 {{ $hargaHariIni }}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>
