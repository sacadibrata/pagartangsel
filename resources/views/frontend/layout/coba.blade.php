@include('frontend.layout.head')

@include('frontend.layout.header')

@include('frontend.layout.navbar')

@include('sweetalert::alert')

<main>
    <div class="mt-4">
     <div class="container">
        <!-- row -->
        <div class="row ">
          <!-- col -->
          <div class="col-12">
             <!-- breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#!">Home</a></li>
                <li class="breadcrumb-item"><a href="#!">Distributors</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Distributors</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
        <!-- section -->
        <section class="mt-8 ">
          <!-- container -->
          <div class="container">
            <!-- row -->
            <div class="row ">
              <div class="col-12 ">
                <!-- heading -->
                <div class="bg-light d-flex justify-content-between ps-md-10 ps-6 rounded">
                  <div class="d-flex align-items-center">
                    <h1 class="mb-0 fw-bold">Distributors</h1>

                  </div>
                  <div class="py-6">
                    <!-- img -->
                    <!-- img -->
                    <img src="{{ asset('dist/assets/images/svg-graphics/store-graphics.svg') }}" alt="" class="img-fluid"></div>
                </div>


              </div>
            </div>
          </div>
        </section>
        <!-- section -->
    <section class="mt-8 mb-lg-14 mb-8">
      <div class="container">
            <!-- row -->
        <div class="row">
              <!-- col -->
          <div class="col-12">
            <div class="mb-3">
               <!-- text -->
              <h6>We have <span class="text-primary">36</span> vendors now</h6>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 g-4 g-lg-4">

   <!-- col -->
          <div class="col">
             <!-- card --><div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-1.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                 <!-- content --><h2 class="mb-1 h5"><a href="#!" class="text-inherit">E-Grocery Super Market</a></h2>
                  <div class="small text-muted"><span class="me-2">Organic </span><span class="me-2">Groceries</span>
                    <span>Butcher Shop</span></div>
                  <div class="py-3">
                    <ul class="list-unstyled mb-0 small">
                      <li>Delivery
                      </li>
                      <li>Pickup available</li>
                    </ul>
                  </div>
                  <div>
                    <!-- badge --> <div class="badge text-bg-light border">7.5 mi away</div>
                    <!-- badge --> <div class="badge text-bg-light border">In-store prices </div>
                  </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


</main>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@include('frontend.layout.footer')

@include('frontend.layout.modalUser')

@include('frontend.layout.script')





