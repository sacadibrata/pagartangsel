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
                <th scope="col">Harga Kemarin</th>
                <th scope="col">Harga Hari ini</th>
                <th scope="col">Perubahan (Rp)</th>
                <th scope="col">Perubahan (%)</th>
                <th scope="col">Keterangan</th>
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
                        <td>{{$c}}.</td>
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
                        @php
                        $hargaKemarin = null;
                        @endphp
                        @foreach ($komoditi->pendataansemuapasar as $hargaBarangSemuaPasar)
                            @if ($hargaBarangSemuaPasar->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                @php
                                    $hargaKemarin = $hargaBarangSemuaPasar->average_harga;
                                @endphp
                                {{ $hargaKemarin }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                         {{-- You can fetch the "Harga Hari Ini" here --}}
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
                    <td>
                          {{-- Calculate and display the perubahan (change) --}}
                            @if ($hargaKemarin !== null && $hargaHariIni !== null)
                            @php
                                $perubahan = $hargaHariIni - $hargaKemarin;
                            @endphp
                            {{ number_format($perubahan) }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        {{-- Calculate and display the perubahan in percentage --}}
                        @if ($hargaKemarin !== null && $hargaHariIni !== null)
                            @php
                                $perubahanPercentage = ($perubahan / $hargaKemarin) * 100;
                            @endphp
                            {{ number_format($perubahanPercentage, 2, ',', '.') }}%
                    </td>
                    <td>
                            @if ($perubahan > 0)
                            <span class="text-danger">Naik</span>
                            @elseif ($perubahan < 0)
                            <span class="text-success">Turun</span>
                            @else
                            <span class="text-secondary">Tetap</span>
                            @endif
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>
