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
                                    <li class="breadcrumb-item"><a href="{{ route('Tren.indexHarian') }}">Tren</a></li>
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
                                    <span class="ms-3">Tren harga {{ $NamaKomoditas->nama_komoditas }} / {{ $NamaKomoditas->satuan->nama_satuan }} di Kota Tangerang Selatan</span>
                                @else
                                    <span class="ms-3">Tren Harga Komoditas Per kg di Kota Tangerang Selatan</span>
                                @endif

                            </h3>
                        </div>
                        <form method="POST" action="{{ route('tren.indexHarian') }}">
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
                        @if (empty($komoditasId) && $InputToday->isEmpty())
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
        let dataKomoditas1 = @json($grafikPasardanKomoditi1);
        let dataKomoditas2 = @json($grafikPasardanKomoditi2);
        let dataKomoditas3 = @json($grafikPasardanKomoditi3);
        let dataKomoditas4 = @json($grafikPasardanKomoditi4);
        let dataKomoditas7 = @json($grafikPasardanKomoditi7);
        let dataKomoditas10 = @json($grafikPasardanKomoditi10);
        let dataKomoditas22 = @json($grafikPasardanKomoditi22);

        // Ekstrak data nama pasar dan harga rata-rata
        let labels = dataKomoditas1.map(item => item.tanggal_input);
        let prices1 = dataKomoditas1.map(item => item.average_harga);
        let prices2 = dataKomoditas2.map(item => item.average_harga);
        let prices3 = dataKomoditas3.map(item => item.average_harga);
        let prices4 = dataKomoditas4.map(item => item.average_harga);
        let prices7 = dataKomoditas7.map(item => item.average_harga);
        let prices10 = dataKomoditas10.map(item => item.average_harga);
        let prices22 = dataKomoditas22.map(item => item.average_harga);

        const ctx = document.getElementById('Chart1').getContext('2d');

        // Membuat array warna yang sesuai dengan jumlah komoditas
        let colors = ['rgba(249, 19, 147)', 'rgba(27, 128, 1)', 'rgba(75,0,130)','rgba(0,128,128)',
        'rgba(255, 127, 0)','rgba(128, 0, 0)','rgba(0, 0, 128)'
        ];

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: `Harga Rata-rata ${dataKomoditas1[0].nama_komoditas}`,
                        data: prices1,
                        borderWidth: 1,
                        backgroundColor: 'rgba(249, 19, 147, 0.2)', // Warna latar belakang
                        borderColor: colors[0], // Warna garis
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas2[0].nama_komoditas}`,
                        data: prices2,
                        borderWidth: 1,
                        backgroundColor: 'rgba(27, 128, 1, 0.2)',
                        borderColor: colors[1],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas3[0].nama_komoditas}`,
                        data: prices3,
                        borderWidth: 1,
                        backgroundColor: 'rgba(75,0,130, 0.2)',
                        borderColor: colors[2],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas4[0].nama_komoditas}`,
                        data: prices4,
                        borderWidth: 1,
                        backgroundColor: 'rgba(0,128,128, 0.2)',
                        borderColor: colors[3],
                    },

                    {
                        label: `Harga Rata-rata ${dataKomoditas7[0].nama_komoditas}`,
                        data: prices7,
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 127, 0, 0.2)',
                        borderColor: colors[4],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas10[0].nama_komoditas}`,
                        data: prices10,
                        borderWidth: 1,
                        backgroundColor: 'rgba(128, 0, 0, 0.2)',
                        borderColor: colors[5],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas22[0].nama_komoditas}`,
                        data: prices22,
                        borderWidth: 1,
                        backgroundColor: 'rgba(0, 0, 128, 0.2)',
                        borderColor: colors[6],
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
        let dataKomoditas1 = @json($grafikPasardanKomoditi1);
        let dataKomoditas2 = @json($grafikPasardanKomoditi2);
        let dataKomoditas3 = @json($grafikPasardanKomoditi3);
        let dataKomoditas4 = @json($grafikPasardanKomoditi4);
        let dataKomoditas7 = @json($grafikPasardanKomoditi7);
        let dataKomoditas10 = @json($grafikPasardanKomoditi10);
        let dataKomoditas22 = @json($grafikPasardanKomoditi22);

        // Ekstrak data nama pasar dan harga rata-rata
        let labels = dataKomoditas1.map(item => item.tanggal_input);
        let prices1 = dataKomoditas1.map(item => item.average_harga);
        let prices2 = dataKomoditas2.map(item => item.average_harga);
        let prices3 = dataKomoditas3.map(item => item.average_harga);
        let prices4 = dataKomoditas4.map(item => item.average_harga);
        let prices7 = dataKomoditas7.map(item => item.average_harga);
        let prices10 = dataKomoditas10.map(item => item.average_harga);
        let prices22 = dataKomoditas22.map(item => item.average_harga);

        const ctx = document.getElementById('Chart2').getContext('2d');

        // Membuat array warna yang sesuai dengan jumlah komoditas
        let colors = ['rgba(249, 19, 147)', 'rgba(27, 128, 1)', 'rgba(75,0,130)','rgba(0,128,128)',
        'rgba(255, 127, 0)','rgba(128, 0, 0)','rgba(0, 0, 128)'
        ];

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: `Harga Rata-rata ${dataKomoditas1[0].nama_komoditas}`,
                        data: prices1,
                        borderWidth: 2,
                        backgroundColor: 'rgba(252, 165, 3, 0.2)', // Warna latar belakang
                        borderColor: colors[0], // Warna garis
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas2[0].nama_komoditas}`,
                        data: prices2,
                        borderWidth: 2,
                        backgroundColor: 'rgba(253, 215, 3, 0.2)',
                        borderColor: colors[1],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas3[0].nama_komoditas}`,
                        data: prices3,
                        borderWidth: 2,
                        backgroundColor: 'rgba(48, 206, 209, 0.2)',
                        borderColor: colors[2],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas4[0].nama_komoditas}`,
                        data: prices4,
                        borderWidth: 1,
                        backgroundColor: 'rgba(0,128,128, 0.2)',
                        borderColor: colors[3],
                    },

                    {
                        label: `Harga Rata-rata ${dataKomoditas7[0].nama_komoditas}`,
                        data: prices7,
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 127, 0, 0.2)',
                        borderColor: colors[4],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas10[0].nama_komoditas}`,
                        data: prices10,
                        borderWidth: 1,
                        backgroundColor: 'rgba(128, 0, 0, 0.2)',
                        borderColor: colors[5],
                    },
                    {
                        label: `Harga Rata-rata ${dataKomoditas22[0].nama_komoditas}`,
                        data: prices22,
                        borderWidth: 1,
                        backgroundColor: 'rgba(0, 0, 128, 0.2)',
                        borderColor: colors[6],
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
        let dataPasardanKomoditi3 = @json($grafikPasardanKomoditi);

        // Ekstrak data nama pasar dan harga rata-rata
        let labels = dataPasardanKomoditi3.map(item => item.tanggal_input);
        let prices = dataPasardanKomoditi3.map(item => item.average_harga);

        const ctx = document.getElementById('Chart3').getContext('2d');

        // Membuat array warna yang sesuai dengan jumlah nama pasar

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `Harga Rata-rata ${dataPasardanKomoditi3[0].nama_komoditas}`,
                    data: prices,
                    borderWidth: 2,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang
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
