@include('frontend.layout.head')

@include('frontend.layout.header')

@include('frontend.layout.navbar')

@include('sweetalert::alert')

<main>
    <!-- section Hero -->
    @include('frontend.layout.hero1')

    <!-- section Hero -->
    @include('frontend.layout.hero')

    <!-- section product -->
    @include('frontend.layout.product')

     <!-- section Grafik -->
     @include('frontend.layout.grafik')

     <!-- section Tabel -->
     @include('frontend.layout.tabel')

    <!-- section pasar -->
    @include('frontend.layout.sectionPasar')

    <!-- section category -->
    @include('frontend.layout.category')

    <!-- section News -->
    @include('frontend.layout.news')

</main>

@include('frontend.layout.footer')

@include('frontend.layout.modalUser')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var komoditiData = {!! json_encode($filteredDataKomoditi) !!};
    var pasars = komoditiData.map(function(item) {
        return item.NamaPasar.nama_pasar;
    });
    var hargaData = komoditiData.map(function(item) {
        return item.average_harga;
    });

    var ctx = document.getElementById('komoditiChart').getContext('2d');
    var komoditiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pasars, // Menggunakan pasar sebagai label X
            datasets: [{
                label: 'Rentang Harga',
                data: hargaData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
</script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@include('frontend.layout.script')


