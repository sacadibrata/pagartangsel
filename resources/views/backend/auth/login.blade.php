@include('frontend.layout.head')

@include('sweetalert::alert')

  <!-- navigation -->
  <div class="border-bottom shadow-sm">
    <nav class="navbar navbar-light py-2">
      <div class="container justify-content-center justify-content-lg-between">
        <a class="navbar-brand" href="{{ route('home.indexFrontend') }}">
          <img src="{{ asset('freshcart/dist/assets/images/logo/freshcart-logo.svg') }}" alt="" class="d-inline-block align-text-top">
        </a>
        <span class="navbar-text">
            Belum Punya Akun? <a href="{{ route('register') }}">Daftar Dulu</a>
          </span>
      </div>
    </nav>
  </div>


<main>
    <!-- section -->
    <section class="my-lg-14 my-8">
      <div class="container">
        <!-- row -->
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
            <!-- img -->
            <img src="{{ asset('freshcart/dist/assets/images/svg-graphics/signin-g.svg') }}" alt="" class="img-fluid">
          </div>
          <!-- col -->
          <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
            <div class="mb-lg-9 mb-5">
              <h1 class="mb-1 h2 fw-bold">Sign in to PagarTangsel</h1>
              <p>Welcome back to PagarTangsel! Enter your email to get started.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row g-3">
                  <!-- row -->

                  <div class="col-12">
                    <!-- input -->
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-12">
                    <!-- input -->
                    <div class="password-field position-relative">
                        <input type="password" placeholder="Enter Password" name="password" class="form-control" required >
                        <span><i id="passwordToggler"class="bi bi-eye-slash"></i></span>
                    </div>
                  </div>

                  <!-- btn -->
                  <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary">Sign In</button>
                  </div>

                </div>
              </form>
          </div>
        </div>
      </div>
    </section>

  </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const showPasswordButton = document.getElementById("showPassword");

            showPasswordButton.addEventListener("click", function () {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    showPasswordButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    passwordInput.type = "password";
                    showPasswordButton.innerHTML = '<i class="fas fa-eye"></i>';
                }
            });
        });
    </script>

@include('frontend.layout.footer')
@include('frontend.layout.script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($message = Session::get('failed'))
    <script>
        Swal.fire('{{ $message }}')
    </script>
@endif

 <!-- Javascript-->
  <!-- Libs JS -->
  <script src="{{ asset('freshcart/dist/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('freshcart/dist/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('freshcart/dist/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

  <!-- Theme JS -->
  <script src="{{ asset('freshcart/dist/assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('freshcart/dist/assets/js/vendors/password.js') }}"></script>


