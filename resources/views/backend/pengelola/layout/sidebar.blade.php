<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="{{ url('/') }}">
				<img src="{{asset('backend/img/tangsel.png')}}" class="img-fluid" width="35" alt="">
				&nbsp PAGAR TANGSEL
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<img src="{{asset('backend/img/avatars/avatar.jpg')}}" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
					<div class="fw-bold">{{ $users->name}}</div>
					<small>{{ $users->role->nama_role}}</small>					
				</div>				
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "DASHBOARD") ? 'active' : '' }}" href="{{url('/')}}">
							<i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-header">
						Setting Pasar
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "KOTA TANGERANG SELATAN") ? 'active' : '' }}" href="{{url('kota')}}">
							<i class="align-middle me-2 fas fa-fw fa-map"></i> <span class="align-middle">Kota</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "KECAMATAN") ? 'active' : '' }}" href="{{url('kecamatan')}}">
							<i class="align-middle me-2 fas fa-fw fa-city"></i> <span class="align-middle">Kecamatan</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "PASAR") ? 'active' : '' }}" href="{{url('pasar')}}">
							<i class="align-middle me-2 fas fa-fw fa-store"></i> <span class="align-middle">Pasar</span>
						</a>
					</li>
					<li class="sidebar-header">
						Setting Komoditi
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "SATUAN") ? 'active' : '' }}" href="{{url('satuan')}}">
							<i class="align-middle me-2 fas fa-fw fa-ruler"></i> <span class="align-middle">Satuan</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "KATEGORI") ? 'active' : '' }}" href="{{url('kategori')}}">
							<i class="align-middle me-2 fas fa-fw fa-briefcase"></i> <span class="align-middle">Kategori</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "KOMODITAS") ? 'active' : '' }}" href="{{url('komoditas')}}">
							<i class="align-middle me-2 fas fa-fw fa-cubes"></i> <span class="align-middle">Komoditas</span>
						</a>
					</li>
					<li class="sidebar-header">
						Setting User
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "STATUS PENGGUNA") ? 'active' : '' }}" href="{{url('role')}}">
							<i class="align-middle me-2 fas fa-fw fa-user-cog"></i> <span class="align-middle">Status Pengguna</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "PEDAGANG") ? 'active' : '' }}" href="{{url('pedagang')}}">
							<i class="align-middle me-2 fas fa-fw fa-user-friends"></i> <span class="align-middle">Pedagang</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{ ($title === "SURVEYOR") ? 'active' : '' }}" href="{{url('surveyor')}}">
							<i class="align-middle me-2 fas fa-fw fa-user-edit"></i> <span class="align-middle">Surveyor</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">
				<a class="sidebar-toggle d-flex me-2">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<input class="form-control form-control-lite" type="text" placeholder="Search ...">
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-envelope-open"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset(('backend/img/avatars/avatar-5.jpg')) }}" class="avatar img-fluid rounded-circle" alt="Michelle Bilodeau">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Michelle Bilodeau</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">5m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="avatar img-fluid rounded-circle" alt="Kathie Burton">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Kathie Burton</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="avatar img-fluid rounded-circle" alt="Alexander Groves">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Alexander Groves</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('backend/img/avatars/avatar-4.jpg') }}" class="avatar img-fluid rounded-circle" alt="Daisy Seger">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Daisy Seger</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-bell"></i>
								<span class="indicator"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-danger fas fa-fw fa-bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-warning fas fa-fw fa-envelope-open"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">6h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-primary fas fa-fw fa-building"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.1</div>
												<div class="text-muted small mt-1">8h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-success fas fa-fw fa-bell-slash"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Anna accepted your request.</div>
												<div class="text-muted small mt-1">12h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
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
								<a class="dropdown-item" href="{{ url('pengelola/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
								<form id="logout-form" action="{{ url('pengelola/logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>