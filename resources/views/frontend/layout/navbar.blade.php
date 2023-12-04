<nav class="navbar navbar-expand-lg navbar-dark bg-primary  py-0 py-lg-2 navbar-default">
    <div class="container-fluid">

      <div class="offcanvas offcanvas-start" tabindex="-1" id="navbar-default" aria-labelledby="navbar-defaultLabel">
        <div class="offcanvas-header pb-1">

          <a href="{{ route('home.indexFrontend') }}"><img src="{{ asset('dist/assets/images/logo/logo_tangsel.png') }}" style="width: 50px; height : 40px" alt="eCommerce HTML Template">&nbsp;&nbsp;<img src="{{ asset('dist/assets/images/logo/logo_pagar.png') }}" style="width: 200px; height :63px" alt="eCommerce HTML Template"></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="d-block d-lg-none mb-4">
          </div>

          <div class="dropdown me-12 d-none d-lg-block">
          </div>
          <div class="" >
            <ul class="navbar-nav align-items-center navbar-offcanvas-color">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home.indexFrontend') }}">
                  Home
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Tabel
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('tabelpasar.indexHargaPerKomoditas') }}">Harga Per Komoditas</a></li>
                  <li><a class="dropdown-item" href="{{ route('tabelpasar.indexHargaPerPasar') }}">Harga Per Pasar</a></li>
                  <li><a class="dropdown-item" href="{{ route('tabelpasar.indexHarga6Pasar') }}">6 Pasar</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Grafik
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('grafikPasar.indexGrafikPerKomoditas') }}">Harga Per Komoditas</a></li>
                    <li><a class="dropdown-item" href="{{ route('grafikPasar.indexGrafikPerPasarDanKomoditas') }}">Harga Per Komoditas dan Pasar</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Tren
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('Tren.indexHarian') }}">Per Hari</a></li>
                    <li><a class="dropdown-item" href="{{ route('Tren.indexBulan') }}">Per Bulan</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Informasi
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../pages/blog.html">Regulasi</a></li>
                  <li><a class="dropdown-item" href="../pages/blog.html">Event</a></li>
                  <li><a class="dropdown-item" href="{{ route('distributors.index') }}">Distributor</a></li>
                  <li><a class="dropdown-item" href="{{ route('profils.index') }}">Profil Pasar</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Stok
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Unduh Data
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../pages/signin.html">Sign in</a></li>
                  <li><a class="dropdown-item" href="../pages/signup.html">Signup</a></li>
                  <li><a class="dropdown-item" href="../pages/forgot-password.html">Forgot Password</a></li>
                  <li class="dropdown-submenu dropend">
                    <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                      My Account
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../pages/account-orders.html">Orders</a></li>
                      <li><a class="dropdown-item" href="../pages/account-settings.html">Settings</a></li>
                      <li><a class="dropdown-item" href="../pages/account-address.html">Address</a></li>
                      <li><a class="dropdown-item" href="../pages/account-payment-method.html">Payment Method</a>
                      </li>
                      <li><a class="dropdown-item" href="../pages/account-notification.html">Notification</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Early Warning System
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
