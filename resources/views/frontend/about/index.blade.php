@include('frontend.layout.head')

@include('frontend.layout.header')

@include('sweetalert::alert')

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <div class="section-title" data-aos="fade-up">
                <h2>Features</h2>
                <p>Tentang Pagar Tangsel</p>
              </div>
          <ol>
            <li><a href="{{ route('home.indexFrontend') }}">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>
          Example inner page template
        </p>
      </div>
    </section>

  </main><!-- End #main -->

@include('frontend.layout.footer')

@include('frontend.layout.script')
