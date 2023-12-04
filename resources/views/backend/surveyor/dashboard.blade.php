@include('backend.surveyor.layout.header')

@include('backend.surveyor.layout.sidebar')

@include('sweetalert::alert')

	<main class="content">
		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Selamat Datang di Dashboard {{ $users->role->nama_role}}
				</h1>
				<p class="header-subtitle">Your bounce rate increased by 5.25% over the past 30 days.</p>
			</div>

			<div class="row">
				<div class="col-xl-6 col-xxl-5 d-flex">
					<div class="w-100">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Visitors</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="users"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-2 mb-4">2.562</h1>
										<div class="mb-0">
											<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.65% </span>
											Less visitors than usual
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Real-Time</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="activity"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-2 mb-4">17.212</h1>
										<div class="mb-0">
											<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.50% </span>
											More activity than usual
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Bounce</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="external-link"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-2 mb-4">$24.300</h1>
										<div class="mb-0">
											<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 8.35% </span>
											More visitors than usual
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Activity</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="shopping-cart"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-2 mb-4">43</h1>
										<div class="mb-0">
											<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -4.25% </span>
											Less activity than usual
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-xxl-7 d-flex">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Real-Time</h5>
						</div>
						<div class="card-body px-4">
							<div id="world_map" style="height:275px;"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-md-12 col-xxl-4 d-flex">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Languages</h5>
						</div>
						<table class="table table-striped my-0">
							<thead>
								<tr>
									<th>Language</th>
									<th class="text-end">Users</th>
									<th class="d-none d-xl-table-cell w-75">% Users</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>en-us</td>
									<td class="text-end">735</td>
									<td class="d-none d-xl-table-cell">
										<div class="progress">
											<div class="progress-bar bg-primary-dark" role="progressbar" style="width: 43%;" aria-valuenow="43"
												aria-valuemin="0" aria-valuemax="100">43%</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>en-gb</td>
									<td class="text-end">223</td>
									<td class="d-none d-xl-table-cell">
										<div class="progress">
											<div class="progress-bar bg-primary-dark" role="progressbar" style="width: 27%;" aria-valuenow="27"
												aria-valuemin="0" aria-valuemax="100">27%</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>fr-fr</td>
									<td class="text-end">181</td>
									<td class="d-none d-xl-table-cell">
										<div class="progress">
											<div class="progress-bar bg-primary-dark" role="progressbar" style="width: 22%;" aria-valuenow="22"
												aria-valuemin="0" aria-valuemax="100">22%</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>es-es</td>
									<td class="text-end">132</td>
									<td class="d-none d-xl-table-cell">
										<div class="progress">
											<div class="progress-bar bg-primary-dark" role="progressbar" style="width: 16%;" aria-valuenow="16"
												aria-valuemin="0" aria-valuemax="100">16%</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>de-de</td>
									<td class="text-end">118</td>
									<td class="d-none d-xl-table-cell">
										<div class="progress">
											<div class="progress-bar bg-primary-dark" role="progressbar" style="width: 15%;" aria-valuenow="15"
												aria-valuemin="0" aria-valuemax="100">15%</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>ru-ru</td>
									<td class="text-end">98</td>
									<td class="d-none d-xl-table-cell">
										<div class="progress">
											<div class="progress-bar bg-primary-dark" role="progressbar" style="width: 13%;" aria-valuenow="13"
												aria-valuemin="0" aria-valuemax="100">13%</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-12 col-md-6 col-xxl-4 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Interests</h5>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="chartjs-dashboard-radar"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-xxl-4 d-flex">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Mobile / Desktop</h5>
						</div>
						<div class="card-body d-flex w-100">
							<div class="align-self-center chart">
								<canvas id="chartjs-dashboard-bar-alt"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-lg-7 col-xl-8 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Traffic</h5>
						</div>
						<table id="datatables-dashboard-traffic" class="table table-striped my-0">
							<thead>
								<tr>
									<th>Source</th>
									<th class="text-end">Users</th>
									<th class="d-none d-xl-table-cell text-end">Sessions</th>
									<th class="d-none d-xl-table-cell text-end">Bounce Rate</th>
									<th class="d-none d-xl-table-cell text-end">Avg. Session Duration</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Google</td>
									<td class="text-end">1023</td>
									<td class="d-none d-xl-table-cell text-end">1265</td>
									<td class="d-none d-xl-table-cell text-end text-success">27.23%</td>
									<td class="d-none d-xl-table-cell text-end">00:06:25</td>
								</tr>
								<tr>
									<td>Bing</td>
									<td class="text-end">504</td>
									<td class="d-none d-xl-table-cell text-end">623</td>
									<td class="d-none d-xl-table-cell text-end text-danger">66.76%</td>
									<td class="d-none d-xl-table-cell text-end">00:04:42</td>
								</tr>
								<tr>
									<td>Twitter</td>
									<td class="text-end">462</td>
									<td class="d-none d-xl-table-cell text-end">571</td>
									<td class="d-none d-xl-table-cell text-end text-success">31.53%</td>
									<td class="d-none d-xl-table-cell text-end">00:08:05</td>
								</tr>
								<tr>
									<td>Pinterest</td>
									<td class="text-end">623</td>
									<td class="d-none d-xl-table-cell text-end">770</td>
									<td class="d-none d-xl-table-cell text-end text-danger">52.81%</td>
									<td class="d-none d-xl-table-cell text-end">00:03:10</td>
								</tr>
								<tr>
									<td>DuckDuckGo</td>
									<td class="text-end">693</td>
									<td class="d-none d-xl-table-cell text-end">856</td>
									<td class="d-none d-xl-table-cell text-end text-success">37.36%</td>
									<td class="d-none d-xl-table-cell text-end">00:09:12</td>
								</tr>
								<tr>
									<td>GitHub</td>
									<td class="text-end">713</td>
									<td class="d-none d-xl-table-cell text-end">881</td>
									<td class="d-none d-xl-table-cell text-end text-success">38.09%</td>
									<td class="d-none d-xl-table-cell text-end">00:06:19</td>
								</tr>
								<tr>
									<td>Direct</td>
									<td class="text-end">872</td>
									<td class="d-none d-xl-table-cell text-end">1077</td>
									<td class="d-none d-xl-table-cell text-end text-success">32.70%</td>
									<td class="d-none d-xl-table-cell text-end">00:09:18</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-12 col-lg-5 col-xl-4 d-flex">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Browser Usage</h5>
						</div>
						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xs">
										<canvas id="chartjs-dashboard-pie"></canvas>
									</div>
								</div>

								<table class="table mb-0">
									<tbody>
										<tr>
											<td><i class="fas fa-circle text-primary fa-fw"></i> Chrome</td>
											<td class="text-end">4401</td>
										</tr>
										<tr>
											<td><i class="fas fa-circle text-warning fa-fw"></i> Firefox</td>
											<td class="text-end">4003</td>
										</tr>
										<tr>
											<td><i class="fas fa-circle text-danger fa-fw"></i> IE</td>
											<td class="text-end">1589</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

@include('backend.surveyor.layout.script')
            
@include('backend.surveyor.layout.footer')
		