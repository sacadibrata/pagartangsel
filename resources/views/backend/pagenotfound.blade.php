@include('backend.validator.layout.header')

@include('sweetalert::alert')

<main class="main h-100 w-100">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center">
                        <h1 class="display-1 fw-bold">404</h1>
                        <p class="h1">Page not found.</p>
                        <p class="h2 fw-normal mt-3 mb-4">The page you are looking for might have been removed.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

@include('backend.validator.layout.script')
            
@include('backend.layout.footer')