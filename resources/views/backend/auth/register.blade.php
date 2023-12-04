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
          Sudah Punya Akun? <a href="{{ route('login') }}">Masuk Sini</a>
        </span>
      </div>
    </nav>
  </div>


<main>
    <!-- section -->

    <section class="my-lg-14 my-8">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
            <!-- img -->
            <img src="{{ asset('freshcart/dist/assets/images/svg-graphics/signup-g.svg') }}" alt="" class="img-fluid">
          </div>
          <!-- col -->
          <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
            <div class="mb-lg-9 mb-5">
              <h1 class="mb-1 h2 fw-bold">Get Start Shopping</h1>
              <p>Welcome to FreshCart! Enter your email to get started.</p>
            </div>
            <!-- form -->
            <form method="POST" action="{{ route('register') }}" id="validation-form" enctype="multipart/form-data">
              <div class="row g-3">
                <!-- col -->
                <div class="col">
                  <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" required>
                </div>
                <div class="col">
                    <input id="email" type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required autocomplete="email">
                </div>
                <div class="col-12">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autocomplete="new-password" id="fakePassword">
                </div>
                <div class="col-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <div class="col-12">
                    <select class="form-control" name="role_id" id="role_id" style="width: 100%">
                        <option value>Pilih Hak Akses</option>
                        @foreach ($roles as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>
                <!-- btn -->
                <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <!-- text -->
                <p><small>By continuing, you agree to our <a href="#!"> Terms of Service</a> & <a href="#!">Privacy
                      Policy</a></small></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    </main>

    @include('frontend.layout.footer')
    @include('frontend.layout.script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}')
        </script>
    @endif

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>

     <!-- Javascript-->
      <!-- Libs JS -->
      <script src="{{ asset('freshcart/dist/assets/libs/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ asset('freshcart/dist/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('freshcart/dist/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

      <!-- Theme JS -->
      <script src="{{ asset('freshcart/dist/assets/js/theme.min.js') }}"></script>
      <script src="{{ asset('freshcart/dist/assets/js/vendors/password.js') }}"></script>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Select2 select box
                $("select[name=\"role_id\"]").select2({
                    allowClear: true,
                    placeholder: "Pilih Hak Akses...",
                }).change(function() {
                    $(this).valid();
                });

            // Initialize validation
            $("#validation-form").validate({
                ignore: ".ignore, .select2-input",
                focusInvalid: false,
                rules: {
                    "name": {
                        required: true
                    },
                    "email": {
                        required: true,
                        email: true
                    },
                    "password": {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    "password_confirmation": {
                        required: true,
                        minlength: 6,
                        equalTo: "input[name=\"password\"]"
                    },
                },
                // Errors
                errorPlacement: function errorPlacement(error, element) {
                    var $parent = $(element).parents(".error-placeholder");
                    // Do not duplicate errors
                    if ($parent.find(".jquery-validation-error").length) {
                        return;
                    }
                    $parent.append(
                        error.addClass("jquery-validation-error small form-text invalid-feedback")
                    );
                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".error-placeholder");
                    $el.addClass("is-invalid");
                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                        $el.parent().addClass("is-invalid");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".error-placeholder").find(".is-invalid").removeClass("is-invalid");
                }
            });
        });
    </script>
