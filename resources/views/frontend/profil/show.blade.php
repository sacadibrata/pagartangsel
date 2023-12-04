@include('frontend.layout.head')

@include('frontend.layout.header')

@include('frontend.layout.navbar')

@include('sweetalert::alert')

<main>
    <!-- section -->
    <section class="mt-lg-8">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
            <div class="card border-2 shadow mb-6 bg-light" style="background:url({{ asset('dist/assets/images/svg-graphics/pattern.svg') }}); background-size: cover; background-position: center;">
                <div class="card-body p-6">

          <!-- col -->
          <div class="offset-lg-1 col-lg-10 col-12">
            <div class="row align-items-center mb-10">
              <div class="col-md-6">
                <!-- text -->
                <div class="ms-xxl-14 me-xxl-15 mb-6 mb-md-0 text-center text-md-start">
                  <h2 class="mb-6">Sejarah Pendirian {{ $profil[0]->nama_pasar }}</h2>
                  <p class="mb-0 lead">
                    {{ $profil[0]->sejarah }}
                  </p>
                </div>
              </div>
              <!-- col -->
              <div class="col-md-6">
                <div class=" me-6">
                  <!-- img -->
                  <a href="{{ asset('pasar/' . $profil[0]->gambar) }}" target="_blank"><img src="{{ asset('pasar/' . $profil[0]->gambar) }}" alt="Gambar Pasar" width="100%"></a>
                </div>
              </div>

            </div>
            <!-- row -->
            <div class="row mb-8">
              <div class="col-12">
                <div class="mb-8">
                  <!-- heading -->
                  <h2>Profil {{ $profil[0]->nama_pasar }}</h2>
                </div>
              </div>
              <div class="col-md-4">
                <!-- card -->
                <div class="card bg-info mb-2 border-2 shadow">
                  <!-- card body -->
                  <div class="card-body p-8">
                    <div class="align-items-center d-flex h4 mb-4">
                      <!-- img -->
                      <center><lottie-player src="https://lottie.host/a3a7b7fb-a9aa-4997-a149-f8b406ba714d/5YpaqGMBVc.json"
                      background="##fff" speed="1" style="width: 98px; height: 98px" class="ms-8" loop autoplay direction="1"
                      mode="normal"></lottie-player></center>
                    </div>
                    <h4>Alamat Pasar :</h4>
                    <p style="color: white">
                        {{ $profil[0]->alamat }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <!-- card -->
                <div class="card bg-info mb-2 border-2 shadow">
                  <!-- card body -->
                  <div class="card-body p-8">
                    <div class="align-items-center d-flex h4 mb-4">
                        <!-- img -->
                        <center><lottie-player src="https://lottie.host/4e94be06-5edc-46bd-93ed-46b861053100/bI2x2HfNws.json"
                        background="##fff" speed="1" style="width: 162px; height: 162px" class="ms-8" loop autoplay direction="1"
                        mode="normal"></lottie-player></center>
                      </div>
                    <h4>Jam Operasional :</h4>
                    <p style="color: white">
                        {{ $profil[0]->jam }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <!-- card -->
                <div class="card bg-info mb-2 border-2 shadow">
                  <!-- card body -->
                  <div class="card-body p-8">
                    <div class="align-items-center d-flex h4 mb-4">
                        <!-- img -->
                        <center><lottie-player src="https://lottie.host/9515daa1-62a3-42ed-a9e0-662049a75650/I7k4YJVWNp.json"
                        background="##fff" speed="1" style="width: 162px; height: 162px" class="ms-8" loop autoplay direction="1"
                        mode="normal"></lottie-player></center>
                      </div>
                    <h4>Luas Pasar :</h4>
                    <p style="color: white">
                        {{ $profil[0]->luas }} m²
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-8">
                <div class="col-md-4">
                  <!-- card -->
                  <div class="card bg-info mb-2 border-2 shadow">
                    <!-- card body -->
                    <div class="card-body p-8">
                        <div class="align-items-center d-flex h4 mb-4">
                            <!-- img -->
                            <center><lottie-player src="https://lottie.host/ed65d773-b86b-4b4c-88d0-18dc30fcdbf5/zwFPdzNt6d.json"
                            background="##fff" speed="1" style="width: 157px; height: 157px" class="ms-8" loop autoplay direction="1"
                            mode="normal"></lottie-player></center>
                          </div>
                      <h4>Jumlah Kios :</h4>
                      <p style="color: white"> {{ $profil[0]->kios }} Unit</p>
                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                    <!-- card -->
                    <div class="card bg-info mb-2 border-2 shadow">
                      <!-- card body -->
                      <div class="card-body p-8">
                        <div class="align-items-center d-flex h4 mb-4">
                            <!-- img -->
                            <center><lottie-player src="https://lottie.host/fe2dd792-0e81-4c68-84e6-bfb7b2a9d305/BBXvYfxxtH.json"
                            background="##fff" speed="1" style="width: 157px; height: 157px" class="ms-8" loop autoplay direction="1"
                            mode="normal"></lottie-player></center>
                          </div>
                        <h4>Jumlah Los :</h4>
                        <p style="color: white"> {{ $profil[0]->los }} Unit</p>
                      </div>

                    </div>
                  </div>
                <div class="col-md-4">
                  <!-- card -->
                  <div class="card bg-info mb-2 border-2 shadow">
                    <!-- card body -->
                    <div class="card-body p-8">
                        <div class="align-items-center d-flex h4 mb-4">
                            <!-- img -->
                            <center><lottie-player src="https://lottie.host/9831b88a-0bbc-4cd3-a5c2-2bf9d6737940/9NcvJv7DCt.json"
                            background="##fff" speed="1" style="width: 120px; height: 120px" class="ms-8" loop autoplay direction="1"
                            mode="normal"></lottie-player></center>
                          </div>
                        <h5>Barang yang Diperdagangkan :</h5>
                        <p style="color: white" id="jenisBarang">
                            {{ substr($profil[0]->jenisBarang, 0, 18) }}...
                            <span id="fullContent" style="display: none;">
                                {{ $profil[0]->jenisBarang }}
                            </span>
                            <a style="color: white" href="#" onclick="showFullContent()">Selengkapnya</a>
                        </p>
                    </div>
                    <script>
                        function showFullContent() {
                            document.getElementById('jenisBarang').innerHTML = document.getElementById('fullContent').innerHTML;
                        }
                    </script>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>
        </div>
      </div>
    </section>
    <!-- section -->
  </main>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
   new DataTable('#example', {
    responsive: true
});
</script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@include('frontend.layout.footer')

@include('frontend.layout.modalUser')

@include('frontend.layout.script')





