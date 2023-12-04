<section class="mt-3">
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-7 mb-2 mt-1">
                <div class="card border-2 shadow">
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <h3 class="align-items-center d-flex mb-0 h4">
                                <lottie-player src="https://lottie.host/d645e7cd-61dd-42c5-ad9f-977f5f07985d/lttN0v9YLb.json"
                                background="##FFFFFF" speed="1" style="width: 50px; height: 50px" loop autoplay direction="1"
                                mode="normal"></lottie-player>
                                <span class="ms-3">Informasi Harga Pangan Antar Pasar</span>
                            </h3>
                        </div>
                        <form method="POST" action="{{ route('home.indexFrontend') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col">
                                    <select name="komoditas_id" id="komoditas_id" class="form-control">
                                        @if($NamaKomoditas)
                                            <option value="{{ $NamaKomoditas->id }}">{{ $NamaKomoditas->nama_komoditas }}</option>
                                        @endif
                                        <option value="">--Pilih Komoditas--</option>
                                        @foreach($komoditas as $komoditi)
                                            <option value="{{ $komoditi->id }}">{{ $komoditi->nama_komoditas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input class="form-control me-3" type="date" name="tanggal_input" id="tanggal_input">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-outline-primary rounded-pill px-3" type="submit">Lihat</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if (empty($komoditasId) && empty($tanggal_input) && $InputToday->isEmpty())
                <div class="col-xl-6 col-lg-6 col-md-7 mb-4">
                    <div class="card-body p-1">
                        <div id="map" style="width: 490px; height: 499px;"></div>
                        <script>
                            var data = @json($filteredDataPasarSebagian1);
                            var map = L.map('map').setView([-6.299244990033289, 106.70247529076129], 12);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                }).addTo(map);

                                // Menentukan ikon kustom
                                var customIcon = L.icon({
                                    iconUrl: '{{ asset('pasar/supermarket.png') }}', // Ganti dengan URL gambar ikon kustom
                                    iconSize: [32, 32], // Sesuaikan dengan ukuran ikon Anda
                                    iconAnchor: [16, 32], // Titik ancor ikon, sesuaikan jika diperlukan
                                });

                                data.forEach(function (item) {
                                    var formattedHarga = item.average_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                    var popupContent = '<b>' + item.nama_pasar + '</b><br>Harga ' + item.nama_komoditas + ' :' + ' Rp.' + formattedHarga;
                                    L.marker([item.latitude, item.longitude],{ icon: customIcon }).addTo(map)
                                    .bindPopup(popupContent).openPopup();
                                });
                        </script>
                    </div>
                </div>

            @elseif (empty($komoditasId) && empty($tanggal_input) && $InputToday->isNotEmpty())
                <div class="col-xl-6 col-lg-6 col-md-7 mb-4">
                    <div class="card-body p-1">
                        <div id="map" style="width: 490px; height: 499px;"></div>
                        <script>
                            var data = @json($filteredDataPasarSebagian2);
                            var map = L.map('map').setView([-6.322892421150801, 106.70766799681702], 13);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                }).addTo(map);

                                // Menentukan ikon kustom
                                var customIcon = L.icon({
                                    iconUrl: '{{ asset('pasar/supermarket.png') }}', // Ganti dengan URL gambar ikon kustom
                                    iconSize: [32, 32], // Sesuaikan dengan ukuran ikon Anda
                                    iconAnchor: [16, 32], // Titik ancor ikon, sesuaikan jika diperlukan
                                });

                                data.forEach(function (item) {
                                    var formattedHarga = item.average_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                    var popupContent = '<b>' + item.nama_pasar + '</b><br>Harga ' + item.nama_komoditas + ' :' + ' Rp.' + formattedHarga;
                                    L.marker([item.latitude, item.longitude],{ icon: customIcon }).addTo(map)
                                    .bindPopup(popupContent).openPopup();
                                });
                        </script>
                    </div>
                </div>
            @else
                <div class="col-xl-6 col-lg-6 col-md-7 mb-4">
                    <div class="card-body p-1">
                        <div id="map" style="width: 490px; height: 499px;"></div>
                        <script>
                            var data = @json($filteredDataPasarSebagian);
                            var map = L.map('map').setView([-6.299244990033289, 106.70247529076129], 12);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                }).addTo(map);

                                // Menentukan ikon kustom
                                var customIcon = L.icon({
                                    iconUrl: '{{ asset('pasar/supermarket.png') }}', // Ganti dengan URL gambar ikon kustom
                                    iconSize: [32, 32], // Sesuaikan dengan ukuran ikon Anda
                                    iconAnchor: [16, 32], // Titik ancor ikon, sesuaikan jika diperlukan
                                });

                                data.forEach(function (item) {
                                    var formattedHarga = item.average_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                    var popupContent = '<b>' + item.nama_pasar + '</b><br>Harga ' + item.nama_komoditas + ' :' + ' Rp.' + formattedHarga;
                                    L.marker([item.latitude, item.longitude],{ icon: customIcon }).addTo(map)
                                    .bindPopup(popupContent).openPopup();
                                });
                        </script>
                    </div>
                </div>
            @endif

            <div class="col-lg-6 col-lg-6 col-md-7 mb-2">
                <div class="card border-2 shadow">
                    <div class="card-body p-6">

                        @if (empty($komoditasId) && empty($tanggal_input) && $InputToday->isEmpty())
                            <div class="table-responsive">
                                @if(!empty($NamaKomoditas))
                                <h6><b>
                                    Harga {{ $NamaKomoditas->nama_komoditas }} per tanggal {{ \Carbon\Carbon::parse($tanggal_input)->format('d - m - Y') }}
                                </b> </h6>
                                @else

                                @endif
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Pasar</th>
                                            <th>Harga Rata-Rata</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($filteredDataKomoditiAwal as $data)
                                            <tr>
                                                <td>{{ $data->nama_pasar }}</td>
                                                @php
                                                $hargaKemarin = null;
                                                @endphp
                                                @foreach ($data->gabungandata as $hargaBarangKemarin)
                                                    @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                        @php
                                                            $hargaKemarin = $hargaBarangKemarin->average_harga;
                                                        @endphp
                                                        <td>{{ number_format($hargaKemarin, 0, ',', '.') }}</td>
                                                    @endif
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
                                    Harga {{ $NamaKomoditas->nama_komoditas }} per tanggal {{ \Carbon\Carbon::parse($tanggal_input)->format('d - m - Y') }}
                                </b> </h6>
                                @else

                                @endif
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Pasar</th>
                                            <th>Harga Rata-Rata</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($filteredDataKomoditiAwal as $data)
                                            <tr>
                                                <td>{{ $data->nama_pasar }}</td>
                                                @php
                                                $hargaHariIni = null;
                                                @endphp
                                                @foreach ($data->gabungandata as $hargaBarangHariIni)
                                                    @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                        @php
                                                            $hargaHariIni = $hargaBarangHariIni->average_harga;
                                                        @endphp
                                                        <td>{{ number_format($hargaHariIni, 0, ',', '.') }}</td>
                                                    @endif
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
                                    Harga {{ $NamaKomoditas->nama_komoditas }} per tanggal {{ \Carbon\Carbon::parse($tanggal_input)->format('d - m - Y') }}
                                </b> </h6>
                                @else

                                @endif
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Pasar</th>
                                            <th>Harga Rata-Rata</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($filteredDataKomoditi as $data)
                                            <tr>
                                                <td>{{ $data->nama_pasar }}</td>
                                                @foreach ($data->gabungandata as $hargaBarang)
                                                <td>Rp. {{ number_format($hargaBarang->average_harga, 0, '.', '.') }}</td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="section-subtitle">
                                @if(!empty($NamaKomoditas) && count($filteredDataKomoditas) > 0)
                                    <h6>Informasi harga untuk komoditas <b>{{ $NamaKomoditas->nama_komoditas }} / {{ $NamaKomoditas->satuan->nama_satuan }}</b> di Kota Tangerang Selatan <b>tanggal {{ \Carbon\Carbon::parse($tanggal_input)->format('d - m - Y') }}</b>. Dari 6 data pasar pantau,
                                        diperoleh <b> harga rata-rata adalah sebesar Rp. {{ number_format($filteredDataKomoditas->avg('average_harga'), 0, ',', '.') }},-.
                                        Untuk Harga rata-rata tertinggi berada di {{ $pasarDenganHargaTertinggi->nama_pasar }} sebesar Rp. {{ number_format($filteredDataKomoditas->max('average_harga'), 0, ',', '.') }},-
                                        dan harga rata-rata terendah berada di {{ $pasarDenganHargaTerendah->nama_pasar }} sebesar Rp. {{ number_format($filteredDataKomoditas->min('average_harga'), 0, ',', '.') }},-.
                                    </h6>
                                @else
                                    <h6></h6>
                                @endif
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
