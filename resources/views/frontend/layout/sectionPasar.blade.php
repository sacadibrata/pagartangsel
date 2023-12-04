<section class="my-lg-12 my-8">

    <div class="container mt-3">
    <!-- row -->
        <div class="row align-items-center mb-4">
            <div class="col-lg-10 col-9">
                <div class="d-xl-flex justify-content-between align-items-center">
                    <!-- heading -->
                    <div class="d-flex">
                        <h3 class="align-items-center d-flex h4">
                            <lottie-player src="https://lottie.host/df4cbad6-7faf-40aa-9d92-834c6d334bc6/06iASVZfVB.json"
                            background="##FFFFFF" speed="1" style="width: 70px; height: 70px" loop autoplay direction="1"
                            mode="normal"></lottie-player>
                            <span class="ms-3">Profil Pasar di Kota Tangerang Selatan</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-3">
                <div class="slider-arrow  " id="slider-third-arrows"></div>
            </div>
        </div>
    <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="product-slider-second " id="slider-third">
                    <!-- item -->
                    @foreach ($profils as $item)

                    <div class="item">
                        <!-- card -->
                        <div class="card card-product h-100 mb-4 shadow">
                            <div class="card-body position-relative">
                                <!-- badge -->
                                <div class="text-center position-relative ">

                                    <!-- img -->
                                    <a href="{{ asset('pasar/' . $item->gambar) }}" target="_blank" class="img-zoom"> <img src="{{ asset('pasar/' . $item->gambar) }}" alt="Gambar Barang" style="width :350px; height:200px" alt=""
                                        class="mb-3 img-fluid"></a>
                                    <!-- action btn -->
                                    <div class="product-action-btn">
                                    <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                                    <a href="../pages/shop-wishlist.html" class="btn-action mb-1" data-bs-toggle="tooltip"
                                        data-bs-html="true" title="Wishlist"><i
                                        class="bi bi-heart"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip"
                                        data-bs-html="true" title="Compare"><i
                                        class="bi bi-arrow-left-right"></i></a>
                                    </div>
                                </div>
                                <!-- title -->
                                <h2 class="fs-6 mb-2"><a href="{{ route('profils.show', $item->id) }}"
                                    class="text-inherit text-decoration-none">{{$item->nama_pasar}}
                                    </a>
                                </h2>

                                @foreach ($item->profilPasar as $profil)
                                <h2 class="fs-6 mb-2">Kios : &nbsp;{{$profil->kios}} Unit
                                </h2>
                                @endforeach

                                @foreach ($item->profilPasar as $profil)
                                <h2 class="fs-6 mb-2">Los : &nbsp;{{$profil->los}} Unit
                                </h2>
                                @endforeach

                                <!-- price -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div><span class="text-danger"><!--$18--></span></div>
                                    <div><span class="text-uppercase small text-primary">
                                    <!--In Stock--></span>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <a href="{{ route('profils.show', $item->id) }}" class="btn btn-primary btn-sm rounded-pill">Lihat Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

</section>
