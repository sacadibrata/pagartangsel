<div class="main-wrapper">
    <nav class="navbar-vertical-nav d-none d-xl-block ">
        <div class="navbar-vertical">
            <div class="px-4 py-5">
                <a href="{{ route('dashboardAdmin') }}" class="navbar-brand">
                    <img src="{{ asset('dist/assets/images/logo/pagar_.png') }}" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <li class="nav-item ">
                        <a class="nav-link  active " href="{{ route('dashboardAdmin') }}" >
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-house"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item mt-6 mb-3">
                        <span class="nav-label">Data Managements</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link   collapsed " href="#"
                            data-bs-toggle="collapse" data-bs-target="#navCategoriesOrders" aria-expanded="false"
                            aria-controls="navCategoriesOrders">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-plus-circle"></i></span>
                                <span class="nav-link-text">Input Harga</span>
                            </div>
                        </a>
                        <div id="navCategoriesOrders" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexGabungData') }}">
                                        Gabung Data
                                    </a>
                                </li>
                                <!-- Nav item -->
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexSemuaPasar') }}">
                                        Semua Pasar
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexCeger') }}">
                                        Pasar Ceger
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexCimanggis') }}">
                                        Pasar Cimanggis
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexCiputat') }}">
                                        Pasar Ciputat
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexJengkol') }}">
                                        Pasar Jengkol
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexJombang') }}">
                                        Pasar Jombang
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanAll.indexSerpong') }}">
                                        Pasar Serpong
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link   collapsed " href="#"
                            data-bs-toggle="collapse" data-bs-target="#navCategoriesOrder" aria-expanded="false"
                            aria-controls="navCategoriesOrder">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-clipboard-plus"></i></span>
                                <span class="nav-link-text">Input Stok</span>
                            </div>
                        </a>
                        <div id="navCategoriesOrder" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanStok.indexAdminCeger') }}">
                                        Pasar Ceger
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanStok.indexAdminCimanggis') }}">
                                        Pasar Cimanggis
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanStok.indexAdminCiputat') }}">
                                        Pasar Ciputat
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanStok.indexAdminJengkol') }}">
                                        Pasar Jengkol
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanStok.indexAdminJombang') }}">
                                        Pasar Jombang
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link "
                                        href="{{ route('pendataanStok.indexAdminSerpong') }}">
                                        Pasar Serpong
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#!">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-table"></i></span>
                                <span class="nav-link-text">Tabel</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#!">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-reception-3"></i></span>
                                <span class="nav-link-text">Grafik</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#!">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-cloud-download"></i></span>
                                <span class="nav-link-text">Unduh Data</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item mt-6 mb-3">
                        <span class="nav-label">Store Managements</span>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('kategori.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-boxes"></i></span>
                                <span class="nav-link-text">Categories</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('satuan.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-speedometer"></i></span>
                                <span class="nav-link-text">Units</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link "  href="{{ route('komoditas.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-cart4"></i></span>
                                <span class="nav-link-text">Products</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('distributor.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-houses"></i></span>
                                <span class="nav-link-text">Distributors</span>
                            </div>
                        </a>
                    </li>
                        <!-- Nav item -->

                <li class="nav-item mt-6 mb-3">
                    <span class="nav-label">Market Managements</span>
                </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('kota.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-buildings"></i></span>
                                <span class="nav-link-text">City</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('kecamatan.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-building"></i></span>
                                <span class="nav-link-text">Subdistrict</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('pasar.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-shop"></i></span>
                                <span class="nav-link-text">Markets</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('profil.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                <span class="nav-link-text">Profile Markets</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item mt-6 mb-3">
                        <span class="nav-label">User Managements</span>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('role.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-person-fill-lock"></i></span>
                                <span class="nav-link-text">Role</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('datasurveyor.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"> <i class="bi bi-question-circle"></i></span>
                                <span class="nav-link-text">Surveyor</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
