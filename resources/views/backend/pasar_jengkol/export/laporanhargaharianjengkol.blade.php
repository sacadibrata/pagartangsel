<h3 style="text-transform: uppercase;">LAPORAN HARGA HARIAN</h3>
<small>Per Tanggal {{ Carbon\Carbon::today()->format('d F Y') }}</small>
<h4 style="text-transform: uppercase;">Nama :  {{ $pasar->user->name }}</h4>
<h4 style="text-transform: uppercase;">Pasar :  {{ $pasar->pasar->nama_pasar }}</h4>

<div class="table-responsive">
    <table class="table mb-0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Komoditas</th>
                <th scope="col">Satuan</th>
                <th scope="col">{{ Carbon\Carbon::today()->format('d F Y') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
            $currentKategori = null;
            @endphp
            <?php $i = 1; ?>
            @foreach ($komoditas as $komoditi)
                @if ($komoditi->kategori->nama_kategori != $currentKategori)
                    <tr>
                        <td colspan="8"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                    </tr>
                    @php
                        $currentKategori = $komoditi->kategori->nama_kategori;
                    @endphp
                @endif
                <tr>
                    <td>{{$i}}.</td>
                    <td>{{ $komoditi->nama_komoditas }}</td>
                    <td style="text-align: center">{{ $komoditi->satuan->nama_satuan }}</td>
                    <td>
                         {{-- You can fetch the "Harga Hari Ini" here --}}
                        @php
                        $hargaHariIni = null;
                        @endphp
                        @foreach ($komoditi->pendataanjengkol as $hargaBarang)
                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                @php
                                    $hargaHariIni = $hargaBarang->average_harga;
                                @endphp
                                {{ number_format($hargaHariIni) }}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>
