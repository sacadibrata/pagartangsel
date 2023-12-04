@include('backend.pasar_serpong.layout.header')

@include('backend.pasar_serpong.layout.sidebar')

@include('sweetalert::alert')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Selamat Datang di Dashboard {{ $users->role->nama_role}}
            </h1>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card shadow" style="border-radius: 20px; background: linear-gradient(to bottom, #b7e4c7, #7fffd4); color: white; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
                    <div class="card-header">
                        <h6 style="font-size: small;"> <img src="{{asset('komoditas/caution.gif')}}" class="img-fluid" width="50" alt="">&nbsp;&nbsp;Komoditas yang Mengalami Kenaikan Harga:</h6>
                        <?php $i = 1; ?>
                        @foreach ($komoditas as $komoditi)
                        @php
                        $hargaKemarin = null;
                        @endphp
                        @foreach ($komoditi->pendataanserpong as $hargaBarang)
                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                @php
                                    $hargaKemarin = $hargaBarang->average_harga;
                                @endphp

                            @endif
                        @endforeach

                        @php
                        $hargaHariIni = null;
                        @endphp
                        @foreach ($komoditi->pendataanserpong as $hargaBarang)
                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                @php
                                    $hargaHariIni = $hargaBarang->average_harga;
                                @endphp

                            @endif
                        @endforeach

                        @if ($hargaKemarin !== null && $hargaHariIni !== null)
                        @php
                                $perubahan = $hargaHariIni - $hargaKemarin;
                        @endphp
                            <ul>
                                @if ($hargaKemarin < $hargaHariIni)
                                <li style="list-style-type: disc; color: black;font-size: small;"><span><button class="btn btn-sm btn-pill btn-danger" style="border-radius: 20px;">Harga {{ $komoditi->nama_komoditas }} Naik Sebesar Rp. {{ number_format($perubahan, 0, ',', '.') }},- &nbsp;</button></span></li>
                                @endif
                            </ul>
                        @else
                        @endif
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow" style="border-radius: 20px; background: linear-gradient(to bottom, #b7e4c7, #7fffd4); color: white; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
                    <div class="card-header">
                        <h6 style="font-size: small;"> <img src="{{asset('komoditas/smile.gif')}}" class="img-fluid" width="50" alt="">&nbsp;&nbsp;Komoditas yang Mengalami Penurunan Harga:</h6>
                        <?php $i = 1; ?>
                        @foreach ($komoditas as $komoditi)
                        @php
                        $hargaKemarin = null;
                        @endphp
                        @foreach ($komoditi->pendataanserpong as $hargaBarang)
                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                @php
                                    $hargaKemarin = $hargaBarang->average_harga;
                                @endphp

                            @endif
                        @endforeach

                        @php
                        $hargaHariIni = null;
                        @endphp
                        @foreach ($komoditi->pendataanserpong as $hargaBarang)
                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                @php
                                    $hargaHariIni = $hargaBarang->average_harga;
                                @endphp

                            @endif
                        @endforeach

                        @if ($hargaKemarin !== null && $hargaHariIni !== null)
                        @php
                                $perubahan = $hargaHariIni - $hargaKemarin;
                        @endphp
                            <ul>
                                @if ($hargaKemarin > $hargaHariIni)
                                <li style="list-style-type: disc; color: black;font-size: small;"><span><button class="btn btn-sm btn-pill btn-success" style="border-radius: 20px;">Harga {{ $komoditi->nama_komoditas }} Turun Sebesar Rp. {{ number_format($perubahan, 0, ',', '.') }},- &nbsp;</button></span></li>
                                @endif
                            </ul>
                        @else
                        @endif
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <p class="header-subtitle mt-2" style="color: black; text-align: center;">Harga Rata-Rata dan Perubahan Tanggal <b> {{ Carbon\Carbon::today()->locale('id')->isoFormat('DD MMMM YYYY') }}</b> di {{ $pasar->pasar->nama_pasar }}</p>
            <div id="komoditasCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($komoditas->chunk(6) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $item)
                                    <div class="col-md-4">
                                        <div class="card shadow" style="border-radius: 20px; background: linear-gradient(to bottom, #b7e4c7, #7fffd4); color: white; transition: background-color 0.3s ease; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);">
                                                <div class="card-body">
                                                        <div class="row">
                                                            <div class="col mt-1">
                                                                <h6 style="text-transform: uppercase;">{{ $item->nama_komoditas }}</h6>
                                                            </div>
                                                        </div>
                                                        {{-- You can fetch the "Harga Hari Ini" here --}}
                                                        @php
                                                        $hargaHariIni = null;
                                                        @endphp
                                                        @foreach ($item->pendataanserpong as $hargaBarang)
                                                            @if ($hargaBarang->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                @php
                                                                    $hargaHariIni = $hargaBarang->average_harga;
                                                                @endphp
                                                                <h5 class="display-5 mt-1 mb">Rp. {{ number_format($hargaHariIni, 0, ',', '.') }}</h5>
                                                                <small class="mb-3" style="color: black; text-transform: uppercase;"><b>PER {{ $item->satuan->nama_satuan }}</b></small>
                                                            @endif
                                                        @endforeach
                                                        {{-- You can fetch the "Harga Kemarin" here --}}
                                                        <div class="row">
                                                            <div class="col mt-2">
                                                                @php
                                                                $hargaKemarin = null;
                                                                @endphp
                                                                @foreach ($item->pendataanserpong as $hargaBarang)
                                                                    @if ($hargaBarang->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                                        @php
                                                                            $hargaKemarin = $hargaBarang->average_harga;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach

                                                                {{-- Calculate and display the perubahan (change) --}}
                                                                @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                    @php
                                                                        $perubahan = $hargaHariIni - $hargaKemarin;
                                                                    @endphp
                                                                    @if ($perubahan > 0)
                                                                    <span><button class="btn btn-sm btn-pill btn-danger">Harga Naik &nbsp; <i class="fa-solid fa-arrow-up"></i></button></span>
                                                                    @elseif ($perubahan < 0)
                                                                    <span><button class="btn btn-sm btn-pill btn-success">Harga Turun &nbsp; <i class="fa-solid fa-arrow-down"></i> </button></span>
                                                                    @else
                                                                    <span><button class="btn btn-sm btn-pill btn-warning">Harga Tetap &nbsp;<i class="fa-solid fa-equals"></i></button></span>
                                                                    @endif
                                                                @else
                                                                    -
                                                                @endif
                                                            </div>
                                                        </div>
                                                    {{-- Calculate and display the perubahan in percentage --}}
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#komoditasCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#komoditasCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>

    </div>
</main>

@include('backend.pasar_serpong.layout.footer')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>





