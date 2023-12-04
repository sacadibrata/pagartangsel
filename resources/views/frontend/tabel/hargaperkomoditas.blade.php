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
                                    <li class="breadcrumb-item"><a href="{{ route('tabelpasar.indexHargaPerKomoditas') }}">Tabel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Harga Per Komoditas</li>
                                    </ol>
                                </nav>
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
                                <h3 class="align-items-center d-flex mb-0 h4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-map-pin text-danger">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    @if ($NamaKomoditas)
                                        <span class="ms-3">Harga Rata-Rata {{ $NamaKomoditas->nama_komoditas }}  di 6 Pasar Pantau Sampai Dengan Tanggal {{ Carbon\Carbon::today()->locale('id')->isoFormat('DD MMMM YYYY') }}</span>
                                    @else
                                        <span class="ms-3">Harga Rata-Rata Beras Premium di 6 Pasar Pantau Sampai Dengan Tanggal {{ Carbon\Carbon::today()->locale('id')->isoFormat('DD MMMM YYYY') }}</span>
                                    @endif

                                </h3>
                            </div>
                            <form method="POST" action="{{ route('tabelpasar.indexHargaPerKomoditas') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col">
                                        <select name="komoditas_id" id="komoditas_id" class="form-control">
                                            @if($NamaKomoditas)
                                                <option value="{{ $NamaKomoditas->id }}">{{ $NamaKomoditas->nama_komoditas }}</option>
                                            @endif
                                            <option value="">--Pilih Komoditas--</option>
                                            @foreach($komoditas as $komoditi)
                                                <option value="{{ $komoditi->id }}">{{ $komoditi->nama_komoditas }} / {{ $komoditi->satuan->nama_satuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-outline-primary rounded-pill px-3" type="submit">Lihat</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-7 mb-4 mt-1">
                    <div class="card border-2 shadow">
                        <div class="card-body p-6">
                            <div class="mb-4">
                                    @if (empty($komoditasId) && empty($tanggal_input) && $InputToday->isEmpty())
                                    <div class="table-responsive">
                                        @if(!empty($NamaKomoditas))
                                        <h6><b>
                                            {{ $NamaKomoditas->nama_komoditas }}
                                        </b> </h6>
                                        @else

                                        @endif
                                        <hr>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama Pasar</th>
                                                    @foreach ($lastThreeDay as $date)
                                                        <th>{{ date('d-m-Y', strtotime($date)) }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($filteredDataKomoditiAwal as $data)
                                                    <tr>
                                                        <td>{{ $data->nama_pasar }}</td>
                                                        @foreach ($lastThreeDay as $date)
                                                        @php
                                                        $hargaKemarin = null;
                                                        @endphp
                                                        @foreach ($data->gabungandata as $hargaBarangKemarin)
                                                            @if ($hargaBarangKemarin->tanggal_input == $date)
                                                                @php
                                                                    $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                                @endphp
                                                                <td>{{ number_format($hargaKemarin, 0, ',', '.') }}</td>
                                                            @endif
                                                        @endforeach
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                @elseif (empty($komoditasId) && empty($tanggal_input) && $InputToday->isNotEmpty())
                                    <div class="table-responsive">
                                        @if(!empty($NamaKomoditas))
                                        <h6><b>
                                            {{ $NamaKomoditas->nama_komoditas }}
                                        </b> </h6>
                                        @else
                                        @endif
                                        <hr>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama Pasar</th>
                                                    @foreach ($lastThreeDay as $date)
                                                        <th>{{ date('d-m-Y', strtotime($date)) }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($filteredDataKomoditiAwal as $data)
                                                    <tr>
                                                        <td>{{ $data->nama_pasar }}</td>
                                                        @foreach ($lastThreeDay as $date)
                                                        @php
                                                        $hargaKemarin = null;
                                                        @endphp
                                                        @foreach ($data->gabungandata as $hargaBarangKemarin)
                                                            @if ($hargaBarangKemarin->tanggal_input == $date)
                                                                @php
                                                                    $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                                @endphp
                                                                <td>{{ number_format($hargaKemarin, 0, ',', '.') }}</td>
                                                            @endif
                                                        @endforeach
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    @if(isset($filteredDataPasarSebagian))
                                    <div class="table-responsive">
                                        @if(!empty($NamaKomoditas))
                                        <h6><b>
                                            {{ $NamaKomoditas->nama_komoditas }}
                                        </b> </h6>
                                        @else

                                        @endif
                                        <hr>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama Pasar</th>
                                                    @foreach ($lastThreeDays as $date)
                                                        <th>{{ date('d-m-Y', strtotime($date)) }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($filterDataKomoditi as $data)
                                                    <tr>
                                                        <td>{{ $data->nama_pasar }}</td>
                                                        @foreach ($lastThreeDays as $date)
                                                        @php
                                                        $hargaHariIni = null;
                                                        @endphp
                                                        @foreach ($data->gabungandata as $hargaBarangHariIni)
                                                            @if ($hargaBarangHariIni->tanggal_input == $date)
                                                                @php
                                                                    $hargaHariIni = $hargaBarangHariIni->average_harga;
                                                                @endphp
                                                                <td>{{ number_format($hargaHariIni, 0, ',', '.') }}</td>
                                                            @endif
                                                        @endforeach
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
