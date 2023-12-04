<body>
        <!-- main -->
    <div>
        <nav class="navbar navbar-expand-lg navbar-glass">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="d-flex align-items-center">
                            <a class="text-inherit d-block d-xl-none me-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                aria-controls="offcanvasExample">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-text-indent-right" viewBox="0 0 16 16">
                                    <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </a>
                        </div>
                        <div>
                            <ul class="list-unstyled d-flex align-items-center mb-0 ms-5 ms-lg-0">
                                <li class="dropdown ms-4">
                                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('user/'.$users->foto) }}" alt="{{ $users->name}}" class="avatar avatar-md rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end p-0">
                                            <div class="lh-1 px-5 py-4 border-bottom">
                                                <h5 class="mb-1 h6">{{ $users->role->nama_role}}</h5>
                                                <small>{{ $users->name}}</small>
                                            </div>
                                        <ul class="list-unstyled px-2 py-3">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('dashboardAdmin') }}">
                                                Home
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#!">
                                                Profile
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="border-top px-5 py-3">
                                            <form action="{{ route('logoutAll') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        </nav>
