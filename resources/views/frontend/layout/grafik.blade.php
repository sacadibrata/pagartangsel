<section class="my-lg-10 my-8">
    <div class="container">
        <div class="row align-items-center mb-4">
            <!-- store -->
            <div class="col-md-8">
                    <div class="mt-1">
                        <h3 class="align-items-center d-flex h4">
                            <lottie-player src="https://lottie.host/e7826b34-cfbe-4ebf-9cdb-51bc0771b174/3qLq700dEI.json"
                            background="##FFFFFF" speed="1" style="width: 50px; height: 50px" loop autoplay direction="1"
                            mode="normal"></lottie-player>
                            <span class="ms-3 mt-4">Grafik Harga</span>
                        </h3>
                    </div>
            </div>
                <!-- all store -->
            <div class="col-md-4 text-end col-12 d-none d-md-block">
                <a href="#">
                    All Grafik
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>
             <!-- row -->
       <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2 g-6 g-lg-6 mb-3">
            <!-- col -->
            <div class="col">
                <!-- card -->

                <div class="card p-6 card-product">

                    <div class="mt-4">
                    <!-- content -->
                    <h2 class="mb-1 h5"><a href="#!" class="text-inherit">{{ $grafikBeras1->first()->nama_komoditas }}, {{ $grafikBeras2->first()->nama_komoditas }}, {{ $grafikBeras3->first()->nama_komoditas }}</a></h2>
                    <div class="py-3">
                        <canvas id="myChart"width="300" height="108"></canvas>
                    </div>
                    <div>
                        <!-- badge -->
                        <div class="badge text-bg-light border">{{ $grafikBeras1->first()->nama_kategori }} </div>
                    </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Data dari kontroler
                    let dataBeras1 = @json($grafikBeras1);
                    let dataBeras2 = @json($grafikBeras2);
                    let dataBeras3 = @json($grafikBeras3);

                    // Ekstrak data nama pasar dan harga rata-rata
                    let labels = dataBeras1.map(item => item.tanggal_input);
                    let prices1 = dataBeras1.map(item => item.average_harga);
                    let prices2 = dataBeras2.map(item => item.average_harga);
                    let prices3 = dataBeras3.map(item => item.average_harga);

                    labels = labels.slice(-7);
                    prices1 = prices1.slice(-7);
                    prices2 = prices2.slice(-7);
                    prices3 = prices3.slice(-7);

                    const ctx = document.getElementById('myChart').getContext('2d');

                    let colors = ['rgba(252, 165, 3)', 'rgba(0, 0, 128)', 'rgba(249, 19, 147)'];

                    // Membuat array warna yang sesuai dengan jumlah nama pasar

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: `Harga Rata-rata ${dataBeras1[0].nama_komoditas}`,
                                    data: prices1,
                                    borderWidth: 2,
                                    backgroundColor: 'rgba(252, 165, 3, 0.2)', // Warna latar belakang
                                    borderColor: colors[0], // Warna garis
                                },
                                {
                                    label: `Harga Rata-rata ${dataBeras2[0].nama_komoditas}`,
                                    data: prices2,
                                    borderWidth: 2,
                                    backgroundColor: 'rgba(0, 0, 128, 0.2)',
                                    borderColor: colors[1],
                                },
                                {
                                    label: `Harga Rata-rata ${dataBeras3[0].nama_komoditas}`,
                                    data: prices3,
                                    borderWidth: 2,
                                    backgroundColor: 'rgba(249, 19, 147, 0.2)',
                                    borderColor: colors[2],
                                }
                        ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>

            <!-- col -->
            <div class="col">
                <!-- card -->
                <div class="card p-6 card-product">

                    <div class="mt-4">
                    <!-- content -->
                    <h2 class="mb-1 h5"><a href="#!" class="text-inherit">{{ $grafikGula->first()->nama_komoditas }}</a></h2>
                    <div class="py-3">
                        <canvas id="myChartGula"width="300" height="108"></canvas>
                    </div>
                    <div>
                        <!-- badge -->
                        <div class="badge text-bg-light border">{{ $grafikGula->first()->nama_kategori }}</div>
                    </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Data dari kontroler
                    let dataGula = @json($grafikGula);

                    // Ekstrak data nama pasar dan harga rata-rata
                    let labelsGula = dataGula.map(item => item.tanggal_input);
                    let pricesGula = dataGula.map(item => item.average_harga);

                    labelsGula = labelsGula.slice(-7);
                    pricesGula = pricesGula.slice(-7);

                    const ctx = document.getElementById('myChartGula').getContext('2d');

                    // Membuat array warna yang sesuai dengan jumlah nama pasar

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labelsGula,
                            datasets: [{
                                label: `Harga Rata-rata ${dataGula[0].nama_komoditas}`,
                                data: pricesGula,
                                borderWidth: 1,
                                backgroundColor: 'rgba(191, 0, 255, 1)', // Warna latar belakang
                                borderColor: 'rgb(191, 0, 255, 1)', // Warna garis
                                borderWidth: 1,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>
       </div>

        <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2 g-6 g-lg-6">
            <!-- col -->
            <div class="col">
                <!-- card -->
                <div class="card p-6 card-product">

                    <div class="mt-4">
                    <!-- content -->
                    <h2 class="mb-1 h5"><a href="#!" class="text-inherit">{{ $grafikTelur->first()->nama_komoditas }}</a></h2>
                    <div class="py-3">
                        <canvas id="myChartTelur"width="300" height="108"></canvas>
                    </div>
                    <div>
                        <!-- badge -->
                        <div class="badge text-bg-light border">{{ $grafikTelur->first()->nama_kategori }}</div>
                    </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Data dari kontroler
                    let dataTelur = @json($grafikTelur);

                    // Ekstrak data nama pasar dan harga rata-rata
                    let labelsTelur = dataTelur.map(item => item.tanggal_input);
                    let pricesTelur = dataTelur.map(item => item.average_harga);

                    labelsTelur = labelsTelur.slice(-7);
                    pricesTelur = pricesTelur.slice(-7);

                    const ctx = document.getElementById('myChartTelur').getContext('2d');

                    // Membuat array warna yang sesuai dengan jumlah nama pasar

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labelsTelur,
                            datasets: [{
                                label: `Harga Rata-rata ${dataTelur[0].nama_komoditas}`,
                                data: pricesTelur,
                                borderWidth: 1,
                                backgroundColor: 'rgba(75, 192, 192, 1)', // Warna latar belakang
                                borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                                borderWidth: 1,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>


            <!-- col -->
            <div class="col">
                <!-- card -->
                <div class="card p-6 card-product">

                    <div class="mt-4">
                    <!-- content -->
                    <h2 class="mb-1 h5"><a href="#!" class="text-inherit">{{ $grafikCabai->first()->nama_komoditas }}</a></h2>
                    <div class="py-3">
                        <canvas id="myChartCabai"width="300" height="108"></canvas>
                    </div>
                    <div>
                        <!-- badge -->
                        <div class="badge text-bg-light border">{{ $grafikCabai->first()->nama_kategori }}</div>
                    </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Data dari kontroler
                    let dataCabai = @json($grafikCabai);

                    // Ekstrak data nama pasar dan harga rata-rata
                    let labelsCabai = dataCabai.map(item => item.tanggal_input);
                    let pricesCabai = dataCabai.map(item => item.average_harga);

                    labelsCabai = labelsCabai.slice(-7);
                    pricesCabai = pricesCabai.slice(-7);

                    const ctx = document.getElementById('myChartCabai').getContext('2d');

                    // Membuat array warna yang sesuai dengan jumlah nama pasar

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labelsCabai,
                            datasets: [{
                                label: `Harga Rata-rata ${dataCabai[0].nama_komoditas}`,
                                data: pricesCabai,
                                borderWidth: 1,
                                backgroundColor: 'rgba(253, 215, 3, 1)', // Warna latar belakang
                                borderColor: 'rgb(253, 215, 3, 1)', // Warna garis
                                borderWidth: 1,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>

        </div>

    </div>
</section>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

