<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="{{ route('dashboardJombang') }}">
				<img src="{{asset('backend/img/tangsel.png')}}" class="img-fluid" width="35" alt="">
				&nbsp PAGAR TANGSEL
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<img src="{{ asset('user/'.$users->foto) }}" class="img-fluid rounded-circle mb-2" alt="{{ $users->name}}" />
					<div class="fw-bold">{{ $users->name}}</div>
					<small>{{ $users->role->nama_role}}</small>
				</div>
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "DASHBOARD") ? 'active' : '' }}" href="{{ route('dashboardJombang') }}">
							<i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-header">
						Setting Harga Komoditas
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "INPUT HARGA") ? 'active' : '' }}" href="{{ route('pendataanPsJombang.index') }}">
							<i class="align-middle me-2 fas fa-fw fa-cart-plus"></i> <span class="align-middle">Input Harga</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "TABEL HARGA") ? 'active' : '' }}" href="{{route('tabelhargaJombang.index')}}">
							<i class="align-middle me-2 fas fa-fw fa-table"></i> <span class="align-middle">Tabel Harga</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "GRAFIK") ? 'active' : '' }}" href="{{route('grafikJombang.index')}}">
							<i class="align-middle me-2 fas fa-fw fa-chart-line"></i> <span class="align-middle">Grafik Harga</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle me-2 fas fa-fw fa-file-download"></i> <span class="align-middle">Unduh Data</span>
						</a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<!--<li class="sidebar-item"><a class="sidebar-link" href="{{route('exportFormByDate')}}">Berdasarkan Tanggal</a></li> -->
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('exportJombang.index') }}">Laporan Harga</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('exportFormLaporanPilihTanggalJombang')}}">Laporan Harga Berdasarkan Tanggal</a></li>
						</ul>
					</li>
                    <li class="sidebar-header" style="font-size: small;">
						Setting Penyebab Kenaikan Harga Komoditas
					</li>
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ ($title === "DAFTAR PENYEBAB KENAIKAN HARGA") ? 'active' : '' }}" href="{{ route('reasonJombang.index') }}">
                            <i class="align-middle me-2 fas fa-fw fa-clipboard-list"></i> <span class="align-middle" style="font-size: small;">Daftar Penyebab Kenaikan</span>
                        </a>

                    </li>
                    <li class="sidebar-item">

                        <a class="sidebar-link {{ ($title === "INPUT PENYEBAB KENAIKAN HARGA") ? 'active' : '' }}" href="{{ route('alasanJombang.index') }}">
							<i class="align-middle me-2 fas fa-fw fa-exclamation-circle"></i> <span class="align-middle" style="font-size: small;">Input Penyebab Kenaikan</span>
						</a>
                    </li>
                    <li class="sidebar-header">
						Setting Akun
					</li>
                    <li class="sidebar-item">
                        <form action="{{ route('logoutJombang') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out
                            </button>
                        </form>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">
				<a class="sidebar-toggle d-flex me-2">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-user"></i> View Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-comments"></i> Contacts</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-chart-pie"></i> Analytics</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-cogs"></i> Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logoutJombang') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
								<form id="logout-form" action="{{ route('logoutJombang') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
