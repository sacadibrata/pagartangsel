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
                                    <li class="breadcrumb-item"><a href="{{ route('tabelpasar.indexHargaPerPasar') }}">Tabel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Harga Per Pasar</li>
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
                                    @if ($NamaPasar)
                                        <span class="ms-3">Harga Rata-Rata dan Perubahan Tanggal {{ Carbon\Carbon::today()->locale('id')->isoFormat('DD MMMM YYYY') }} di {{ $NamaPasar->nama_pasar }}</span>
                                    @else
                                        <span class="ms-3">Harga Rata-Rata dan Perubahan Tanggal {{ Carbon\Carbon::today()->locale('id')->isoFormat('DD MMMM YYYY') }} di Semua Pasar</span>
                                    @endif
                                    </h3>
                            </div>
                            <form method="POST" action="{{ route('tabelpasar.indexHargaPerPasar') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col">
                                        <select name="pasar_id" id="pasar_id" class="form-control">
                                            @if($NamaPasar)
                                                <option value="{{ $NamaPasar->id }}">{{ $NamaPasar->nama_pasar }}</option>
                                            @endif
                                            <option value="">--Pilih Pasar--</option>
                                            @foreach($pasars as $pasar)
                                                <option value="{{ $pasar->id }}">{{ $pasar->nama_pasar }}</option>
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
                                    @if (empty($pasarId) && $InputToday->isEmpty())
                                        <div class="table-responsive">
                                            @if(!empty($NamaPasar))
                                            <h6><b>
                                                {{ $NamaPasar->nama_pasar }}
                                            </b> </h6>
                                            @else

                                            @endif
                                            <hr>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Komoditas</th>
                                                        <th style="color: purple;">Harga Kemarin</th>
                                                        <th style="color: blue;">Harga Sekarang</th>
                                                        <th>Perubahan (Rp)</th>
                                                        <th>Perubahan (%)</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $currentKategori = null;
                                                    @endphp
                                                    <?php $i = 1; ?>
                                                    @foreach($filterDataPasarAwal as $data)
                                                        @if ($data->kategori->nama_kategori != $currentKategori)
                                                            <tr>
                                                                <td colspan="7"><strong>{{ $data->kategori->nama_kategori }}</strong></td>
                                                            </tr>
                                                            @php
                                                                $currentKategori = $data->kategori->nama_kategori;
                                                            @endphp
                                                        @endif
                                                        <tr>
                                                            <td>{{$i}}.</td>
                                                            <td>{{ $data->nama_komoditas }} ({{ $data->satuan->nama_satuan }})</td>
                                                            <td style="color: purple;">
                                                                @php
                                                                $hargaKemarin = null;
                                                                @endphp
                                                                @foreach ($data->gabungandata as $hargaBarangKemarin)
                                                                    @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::now()->subDay(2)->format('Y-m-d'))
                                                                        @php
                                                                            $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                                        @endphp
                                                                        {{ number_format($hargaKemarin, 0, ',', '.') }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td style="color: blue;">
                                                                {{-- You can fetch the "Harga Hari Ini" here --}}
                                                                @php
                                                                $hargaHariIni = null;
                                                                @endphp
                                                                @foreach ($data->gabungandata as $hargaBarangHariIni)
                                                                    @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                                        @php
                                                                            $hargaHariIni = $hargaBarangHariIni->average_harga;
                                                                        @endphp
                                                                        {{ number_format($hargaHariIni, 0, ',', '.') }}

                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{-- Calculate and display the perubahan (change) --}}
                                                                    @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                    @php
                                                                        $perubahan = $hargaHariIni - $hargaKemarin;
                                                                    @endphp
                                                                    {{ number_format($perubahan, 0, ',', '.') }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{-- Calculate and display the perubahan in percentage --}}
                                                                @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                    @php
                                                                    if ($hargaKemarin != 0) {
                                                                        $perubahanPercentage = ($perubahan / $hargaKemarin) * 100;
                                                                    } else {
                                                                        $perubahanPercentage = 0; // Set a default value (0% change in this case)
                                                                    }
                                                                    @endphp
                                                                    {{ number_format($perubahanPercentage, 2, ',', '.') }}%
                                                            </td>
                                                            <td>
                                                                    @if ($perubahan > 0)
                                                                    <span class="badge text-bg-danger"><i class="fa-solid fa-arrow-up"></i></span>
                                                                    @elseif ($perubahan < 0)
                                                                    <span class="badge text-bg-success"><i class="fa-solid fa-arrow-down"></i></span>
                                                                    @else
                                                                    <span class="badge text-bg-secondary"><i class="fa-solid fa-equals"></i></span>
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

                                    @elseif (empty($pasarId) && $InputToday->isNotEmpty())
                                        <div class="table-responsive">
                                            @if(!empty($NamaPasar))
                                            <h6><b>
                                                {{ $NamaPasar->nama_pasar }}
                                            </b> </h6>
                                            @else

                                            @endif
                                            <hr>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Komoditas</th>
                                                        <th style="color: purple;">Harga Kemarin</th>
                                                        <th style="color: blue;">Harga Sekarang</th>
                                                        <th>Perubahan (Rp)</th>
                                                        <th>Perubahan (%)</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $currentKategori = null;
                                                    @endphp
                                                    <?php $i = 1; ?>
                                                    @foreach($filterDataPasarAwal as $data)
                                                        @if ($data->kategori->nama_kategori != $currentKategori)
                                                            <tr>
                                                                <td colspan="7"><strong>{{ $data->kategori->nama_kategori }}</strong></td>
                                                            </tr>
                                                            @php
                                                                $currentKategori = $data->kategori->nama_kategori;
                                                            @endphp
                                                        @endif
                                                        <tr>
                                                            <td>{{$i}}.</td>
                                                            <td>{{ $data->nama_komoditas }} ({{ $data->satuan->nama_satuan }})</td>
                                                            <td style="color: purple;">
                                                                @php
                                                                $hargaKemarin = null;
                                                                @endphp
                                                                @foreach ($data->gabungandata as $hargaBarangKemarin)
                                                                    @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                                        @php
                                                                            $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                                        @endphp
                                                                        {{ number_format($hargaKemarin, 0, ',', '.') }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td style="color: blue;">
                                                                {{-- You can fetch the "Harga Hari Ini" here --}}
                                                                @php
                                                                $hargaHariIni = null;
                                                                @endphp
                                                                @foreach ($data->gabungandata as $hargaBarangHariIni)
                                                                    @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                        @php
                                                                            $hargaHariIni = $hargaBarangHariIni->average_harga;
                                                                        @endphp
                                                                        {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{-- Calculate and display the perubahan (change) --}}
                                                                    @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                    @php
                                                                        $perubahan = $hargaHariIni - $hargaKemarin;
                                                                    @endphp
                                                                    {{ number_format($perubahan, 0, ',', '.') }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{-- Calculate and display the perubahan in percentage --}}
                                                                @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                    @php
                                                                    if ($hargaKemarin != 0) {
                                                                        $perubahanPercentage = ($perubahan / $hargaKemarin) * 100;
                                                                    } else {
                                                                        $perubahanPercentage = 0; // Set a default value (0% change in this case)
                                                                    }
                                                                    @endphp
                                                                    {{ number_format($perubahanPercentage, 2, ',', '.') }}%
                                                            </td>
                                                            <td>
                                                                    @if ($perubahan > 0)
                                                                    <span class="badge text-bg-danger"><i class="fa-solid fa-arrow-up"></i></span>
                                                                    @elseif ($perubahan < 0)
                                                                    <span class="badge text-bg-success"><i class="fa-solid fa-arrow-down"></i></span>
                                                                    @else
                                                                    <span class="badge text-bg-secondary"><i class="fa-solid fa-equals"></i></span>
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

                                    @else
                                        <div class="table-responsive">
                                            @if(!empty($NamaPasar))
                                            <h6><b>
                                                {{ $NamaPasar->nama_pasar }}
                                            </b> </h6>
                                            @else

                                            @endif
                                            <hr>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Komoditas</th>
                                                        <th style="color: purple;">Harga Kemarin</th>
                                                        <th style="color: blue;">Harga Sekarang</th>
                                                        <th>Perubahan (Rp)</th>
                                                        <th>Perubahan (%)</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $currentKategori = null;
                                                    @endphp
                                                    <?php $i = 1; ?>
                                                    @foreach($filterDataPasar as $data)
                                                        @if ($data->kategori->nama_kategori != $currentKategori)
                                                            <tr>
                                                                <td colspan="7"><strong>{{ $data->kategori->nama_kategori }}</strong></td>
                                                            </tr>
                                                            @php
                                                                $currentKategori = $data->kategori->nama_kategori;
                                                            @endphp
                                                        @endif
                                                        <tr>
                                                            <td>{{$i}}.</td>
                                                            <td>{{ $data->nama_komoditas }} ({{ $data->satuan->nama_satuan }})</td>
                                                            <td style="color: purple;">
                                                                @php
                                                                $hargaKemarin = null;
                                                                @endphp
                                                                @foreach ($data->gabungandata as $hargaBarangKemarin)
                                                                    @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                                        @php
                                                                            $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                                        @endphp
                                                                        {{ number_format($hargaKemarin, 0, ',', '.') }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td style="color: blue;">
                                                                {{-- You can fetch the "Harga Hari Ini" here --}}
                                                                @php
                                                                $hargaHariIni = null;
                                                                @endphp
                                                                @foreach ($data->gabungandata as $hargaBarangHariIni)
                                                                    @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                                        @php
                                                                            $hargaHariIni = $hargaBarangHariIni->average_harga;
                                                                        @endphp
                                                                        {{ number_format($hargaHariIni, 0, ',', '.') }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{-- Calculate and display the perubahan (change) --}}
                                                                    @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                    @php
                                                                        $perubahan = $hargaHariIni - $hargaKemarin;
                                                                    @endphp
                                                                    {{ number_format($perubahan, 0, ',', '.') }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{-- Calculate and display the perubahan in percentage --}}
                                                                @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                                    @php
                                                                    if ($hargaKemarin != 0) {
                                                                        $perubahanPercentage = ($perubahan / $hargaKemarin) * 100;
                                                                    } else {
                                                                        $perubahanPercentage = 0; // Set a default value (0% change in this case)
                                                                    }
                                                                    @endphp
                                                                    {{ number_format($perubahanPercentage, 2, ',', '.') }}%
                                                            </td>
                                                            <td>
                                                                    @if ($perubahan > 0)
                                                                    <span class="badge text-bg-danger"><i class="fa-solid fa-arrow-up"></i></span>
                                                                    @elseif ($perubahan < 0)
                                                                    <span class="badge text-bg-success"><i class="fa-solid fa-arrow-down"></i></span>
                                                                    @else
                                                                    <span class="badge text-bg-secondary"><i class="fa-solid fa-equals"></i></span>
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

                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
