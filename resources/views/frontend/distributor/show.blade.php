@include('frontend.layout.head')

@include('frontend.layout.header')

@include('frontend.layout.navbar')

@include('sweetalert::alert')

<main>
    <section class="mt-8 ">
        <div class="container">
            <div class="row ">
                <div class="col-12 ">
                    <div class="bg-white d-flex justify-content-between ps-md-10 ps-6 rounded">
                        <div class="d-flex align-items-center">
                            <h3 class="mb-0 fw-bold">LIST DISTRIBUTORS {{ $distributors[0]->nama_kategori }}</h3>
                        </div>
                        <div class="py-6">
                            <!-- img -->
                            <!-- img -->
                            <img src="{{ asset('dist/assets/images/svg-graphics/store-graphics.svg') }}" alt="" style="margin-right :1cm" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- section -->
    <section class="mt-8 mb-lg-14 mb-8">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 g-4 g-lg-4">
                <div class="col">
                    <div class="card p-6 card-product">
                        @foreach ($distributors as $item)
                        <div>
                            <a href="{{ asset('distributor/' . $item->gambar) }}"
                                target="_blank"><img src="{{ asset('distributor/' . $item->gambar) }}"
                                alt="Gambar Distributor" width="100%">
                        </div>
                        <div class="mt-4">
                                <!-- content --><h2 class="mb-2 h5"><a href="{{ $item->url }}" class="text-inherit">{{$item->nama}}</a></h2>
                                <div class="small text-muted"><span class="me-2">{{$item->alamat}}</span>
                                </div>
                                <div class="py-3">
                                    <ul class="list-unstyled mb-0 small">
                                        <li>{{$item->telepon}}
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <!-- badge -->
                                    <!-- badge -->
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@include('frontend.layout.footer')

@include('frontend.layout.modalUser')

@include('frontend.layout.script')





