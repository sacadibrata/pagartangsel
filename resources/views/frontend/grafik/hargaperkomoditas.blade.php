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
                                        <li class="breadcrumb-item"><a href="{{ route('grafikpasar.indexGrafikPerKomoditas') }}">Grafik Harga</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Per Komoditas</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                @if (!empty($NamaKomoditas))
                                    <span class="ms-3">Harga Rata-Rata {{ $NamaKomoditas->nama_komoditas }}  di 6 Pasar Pantau</span>
                                @else
                                <span class="ms-3">Harga Rata-Rata Beras Medium di 6 Pasar Pantau</span>
                                @endif

                            </h3>
                        </div>
                        <form method="POST" action="{{ route('grafikpasar.indexGrafikPerKomoditas') }}">
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
        </div>
    </div>

    <!-- section -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-7 mb-4 mt-1">
                <!-- col -->
                <div class="card border-2 shadow">
                    <!-- card -->
                    <div class="card-body p-6">
                        <!-- content -->
                        @if (empty($komoditasId) && empty($tanggal_input) && $InputToday->isEmpty())
                            <canvas id="Chart1" width="600" height="300"></canvas>

                        @elseif (empty($komoditasId) && empty($tanggal_input) && $InputToday->isNotEmpty())
                            <canvas id="Chart2" width="600" height="300"></canvas>

                        @else
                            <canvas id="Chart3" width="600" height="300"></canvas>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data dari kontroler
        let dataKomoditas1 = @json($grafikKomoditasYesterday);

        // Ekstrak data nama pasar dan harga rata-rata
        let labels = dataKomoditas1.slice(1, 7).map(item => item.nama_pasar);
        let prices = dataKomoditas1.slice(1, 7).map(item => item.average_harga);

        // Array warna untuk setiap nama pasar
            let colors = [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];

            // Ambil panjang labels untuk menentukan berapa banyak warna yang dibutuhkan
            let numColors = labels.length;

            // Potong array warna sesuai dengan jumlah nama pasar
            let backgroundColors = colors.slice(0, numColors);

        const ctx = document.getElementById('Chart1').getContext('2d');

        // Membuat array warna yang sesuai dengan jumlah nama pasar

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `Harga Rata-rata ${dataKomoditas1[0].nama_komoditas}`,
                    data: prices,
                    borderWidth: 2,
                    backgroundColor: backgroundColors, // Warna latar belakang
                    borderColor: 'rgb(0, 0, 128)', // Warna garis

                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data dari kontroler
        let dataKomoditas2 = @json($grafikKomoditasToday);

        // Ekstrak data nama pasar dan harga rata-rata
        let labels = dataKomoditas2.slice(1, 7).map(item => item.nama_pasar);
        let prices = dataKomoditas2.slice(1, 7).map(item => item.average_harga);

        // Array warna untuk setiap nama pasar
        let colors = [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];

            // Ambil panjang labels untuk menentukan berapa banyak warna yang dibutuhkan
            let numColors = labels.length;

            // Potong array warna sesuai dengan jumlah nama pasar
            let backgroundColors = colors.slice(0, numColors);

        const ctx = document.getElementById('Chart2').getContext('2d');

        // Membuat array warna yang sesuai dengan jumlah nama pasar

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                    label: `Harga Rata-rata ${dataKomoditas2[0].nama_komoditas}`,
                    data: prices,
                    borderWidth: 2,
                    backgroundColor: backgroundColors, // Warna latar belakang
                    borderColor: 'rgb(0, 0, 128)', // Warna garis

                },

            ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data dari kontroler
        let dataKomoditas3 = @json($grafikKomoditi);

        // Ekstrak data nama pasar dan harga rata-rata
        let labels = dataKomoditas3.slice(1, 7).map(item => item.nama_pasar);
        let prices = dataKomoditas3.slice(1, 7).map(item => item.average_harga);

        // Array warna untuk setiap nama pasar
        let colors = [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];

            // Ambil panjang labels untuk menentukan berapa banyak warna yang dibutuhkan
            let numColors = labels.length;

            // Potong array warna sesuai dengan jumlah nama pasar
            let backgroundColors = colors.slice(0, numColors);

        const ctx = document.getElementById('Chart3').getContext('2d');

        // Membuat array warna yang sesuai dengan jumlah nama pasar

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                    label: `Harga Rata-rata ${dataKomoditas3[0].nama_komoditas}`,
                    data: prices,
                    borderWidth: 0.5,
                    backgroundColor: backgroundColors, // Warna latar belakang
                    borderColor: 'rgb(0, 0, 128)', // Warna garis

                },

            ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
