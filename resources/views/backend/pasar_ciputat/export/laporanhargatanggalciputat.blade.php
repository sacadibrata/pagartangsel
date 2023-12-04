<h3 style="text-transform: uppercase;">LAPORAN HARGA HARIAN</h3>
<h4 style="text-transform: uppercase;">Nama :  {{ $pasar->user->name }}</h4>
<h4 style="text-transform: uppercase;">Pasar :  {{ $pasar->pasar->nama_pasar }}</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align: center; ">No.</th>
            <th>Komoditas (Rp)</th>
            @foreach ($dates as $date)
                <th>{{ date('d-m-Y', strtotime($date)) }}</th>
            @endforeach
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
                    <td colspan="3"><strong>{{ $komoditi->kategori->nama_kategori }}</strong></td>
                </tr>
                @php
                    $currentKategori = $komoditi->kategori->nama_kategori;
                @endphp
                @endif
            <tr>
                <td style="text-align: center">{{$i}}.</td>
                <td>{{ $komoditi->nama_komoditas }}&nbsp;({{ $komoditi->satuan->nama_satuan }})</td>
                @foreach ($dates as $date)
                <td>
                    @foreach ($komoditi->pendataanciputat as $hargaBarang)
                    @if ($hargaBarang->tanggal_input == $date)
                         @php
                             $hargaHariIni = $hargaBarang->average_harga;
                         @endphp
                            {{ number_format($hargaHariIni) }}
                    @endif
                    @endforeach
                </td>
                @endforeach
            </tr>
            <?php $i++ ?>
        @endforeach
    </tbody>
</table>
