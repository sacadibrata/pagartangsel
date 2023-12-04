

<div class="container">
    <div class="row">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <div class="d-flex">
                <div class="mt-1">
                    <h3 class="align-items-center d-flex h4">
                        <lottie-player src="https://lottie.host/98aabb83-28d1-4c0b-ac5f-7635381bd11a/kH9uNC8TqF.json"
                        background="##FFFFFF" speed="1" style="width: 60px; height: 60px" loop autoplay direction="1"
                        mode="normal"></lottie-player>
                        <span class="ms-3 mt-4">Tabel Harga</span>
                    </h3>
                </div>
                </div>
            </div>
        </div>
            <div class="col-12">
                <div class="mb-4 bg-white d-lg-flex justify-content-between align-items-center shadow p-3 rounded">
                <div class="p-8">
                    @if ($InputToday->isEmpty())
                        <div style="max-height: 300px; overflow: auto;">
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless text-nowrap table-hover small">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th scope="col" style="width: 1%; color: white;">No</th>
                                            <th scope="col" style="width: 20%; color: white;">Bahan Pokok</th>
                                            <th scope="col" style="width: 15%; color: white;">Harga Hari Ini</th>
                                            <th scope="col" style="width: 10%; color: white;">Keterangan</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                    ?>
                                    @foreach ($filterDataAwalPasar as $komoditi)
                                    <tr>
                                        <th scope="row">{{$i}}.</th>
                                        <td>{{ $komoditi->nama_komoditas }}&nbsp;({{ $komoditi->satuan->nama_satuan }})</td>
                                        <td>
                                        @php
                                        $hargaKemarin = null;
                                        @endphp
                                        @foreach ($komoditi->gabungandata as $hargaBarangKemarin)
                                            @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::now()->subDays(2)->format('Y-m-d'))
                                                @php
                                                    $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <!-- batas -->
                                        @php
                                        $hargaHariIni = null;
                                        @endphp
                                        @foreach ($komoditi->gabungandata as $hargaBarangHariIni)
                                            @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                @php
                                                    $hargaHariIni = $hargaBarangHariIni->average_harga;
                                                @endphp
                                                    Rp. {{ number_format($hargaHariIni, 0, ',', '.') }},-
                                            @endif
                                        @endforeach
                                        <!-- batas -->
                                        @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                            @php
                                                $perubahan = $hargaHariIni - $hargaKemarin;
                                            @endphp
                                        </td>
                                        <td>
                                        @if ($perubahan > 0)
                                            <span class="badge text-bg-danger">Naik&nbsp;<i class="fa-solid fa-arrow-up"></i></span>
                                            @elseif ($perubahan < 0)
                                            <span class="badge text-bg-success">Turun&nbsp;<i class="fa-solid fa-arrow-down"></i></span>
                                            @else
                                            <span class="badge text-bg-warning">Tetap&nbsp;<i class="fa-solid fa-equals"></i></span>
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
                        </div>
                    @else
                        <div style="max-height: 300px; overflow: auto;">
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless text-nowrap table-hover small">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th scope="col" style="width: 1%; color: white;">No</th>
                                            <th scope="col" style="width: 20%; color: white;">Bahan Pokok</th>
                                            <th scope="col" style="width: 15%; color: white;">Harga Hari Ini</th>
                                            <th scope="col" style="width: 10%; color: white;">Keterangan</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                    ?>
                                    @foreach ($filterDataAwalPasar as $komoditi)
                                    <tr>
                                        <th scope="row">{{$i}}.</th>
                                        <td>{{ $komoditi->nama_komoditas }}&nbsp;({{ $komoditi->satuan->nama_satuan }})</td>
                                        <td>
                                        @php
                                        $hargaKemarin = null;
                                        @endphp
                                        @foreach ($komoditi->gabungandata as $hargaBarangKemarin)
                                            @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                @php
                                                    $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <!-- batas -->
                                        @php
                                        $hargaHariIni = null;
                                        @endphp
                                        @foreach ($komoditi->gabungandata as $hargaBarangHariIni)
                                            @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                @php
                                                    $hargaHariIni = $hargaBarangHariIni->average_harga;
                                                @endphp
                                                    Rp. {{ number_format($hargaHariIni, 0, ',', '.') }},-
                                            @endif
                                        @endforeach
                                        <!-- batas -->
                                        @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                            @php
                                                $perubahan = $hargaHariIni - $hargaKemarin;
                                            @endphp
                                        </td>
                                        <td>
                                        @if ($perubahan > 0)
                                            <span class="badge text-bg-danger">Naik&nbsp;<i class="fa-solid fa-arrow-up"></i></span>
                                            @elseif ($perubahan < 0)
                                            <span class="badge text-bg-success">Turun&nbsp;<i class="fa-solid fa-arrow-down"></i></span>
                                            @else
                                            <span class="badge text-bg-warning">Tetap&nbsp;<i class="fa-solid fa-equals"></i></span>
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
                        </div>
                    @endif
                </div>
                <div class="p-8 d-lg-block d-none">
                    <lottie-player src="https://lottie.host/4979fe39-f328-4696-beeb-0ffe9ac34cae/WdjlwpFj1p.json" background="##FFFFFF" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
                </div>
                </div>
            </div>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
