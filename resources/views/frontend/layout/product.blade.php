<section class="my-lg-12 my-8">
    <div class="container">
        <!-- row -->
        <div class="row align-items-center mb-6">
            <div class="col-lg-10 col-10">
                <!-- heading -->
                <h3 class="align-items-center d-flex h4">
                    <lottie-player src="https://lottie.host/e806fcbf-4c0f-49bd-9bac-f0e99e4db134/lr5vgSGYlu.json"
                    background="##FFFFFF" speed="1" style="width: 40px; height: 40px" loop autoplay direction="1"
                    mode="normal"></lottie-player>
                    <span class="ms-3">Harga Rata-Rata dan Perubahan {{ Carbon\Carbon::today()->locale('id')->isoFormat('DD MMMM YYYY') }}</span>
                </h3>
            </div>
            <div class="col-lg-2 col-2">
                <div class="slider-arrow" id="slider-second-arrows">
                </div>
            </div>
        </div>
        <!-- slider -->
        <div class="product-slider-second " id="slider-second">

            @if ($InputToday->isEmpty())

                    @foreach ($filterDataAwalPasar as $komoditi)
                        <div class="item">
                            <!-- item -->
                            <div class="card card-product mb-lg-4">
                                <div class="card-body">
                                        @php
                                            $hargaHariIni = null;
                                        @endphp
                                        @foreach ($komoditi->gabungandata as $hargaBarangPasar)
                                            @if ($hargaBarangPasar->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                                @php
                                                    $hargaHariIni = $hargaBarangPasar->average_harga;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @php
                                    $hargaKemarin = null;
                                    @endphp
                                    @foreach ($komoditi->gabungandata as $hargaBarangKemarin)
                                        @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::now()->subDays(2)->format('Y-m-d'))
                                            @php
                                                $hargaKemarin = $hargaBarangKemarin->average_harga;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @php
                                    $hargaHariIni = null;
                                    @endphp
                                    @foreach ($komoditi->gabungandata as $hargaBarangHariIni)
                                        @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                            @php
                                                $hargaHariIni = $hargaBarangHariIni->average_harga;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                        @php
                                            $perubahan = $hargaHariIni - $hargaKemarin;
                                        @endphp

                                    @else

                                    @endif


                                    <!-- badge -->
                                    <div class="text-center position-relative ">
                                        <div class=" position-absolute top-0 start-0 mb-2">
                                        </div>
                                        <!-- img -->
                                        <!-- img -->
                                        <a href="{{ asset('komoditas/' . $komoditi->gambar) }}" target="_blank"> <img src="{{ asset('komoditas/' . $komoditi->gambar) }}"
                                            alt="Gambar {{ $komoditi->id }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        </a>
                                        <!-- action btn -->
                                        <!-- action btn -->
                                        <div class="card-product-action">
                                            <a href="#!" class="btn-action" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="bi bi-eye"
                                                data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                                            </a>
                                            <a href="../pages/shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                                title="Wishlist"><i class="bi bi-heart"></i>
                                            </a>
                                            <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                                title="Compare"><i class="bi bi-arrow-left-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                <!-- title -->
                                <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{ $komoditi->kategori->nama_kategori }}</small></a></div>

                                    <h2 class="fs-6">
                                        <a href="#!" class="text-inherit text-decoration-none">
                                            {{ $komoditi->nama_komoditas }} / {{ $komoditi->satuan->nama_satuan }}
                                        </a>
                                    </h2>

                                <!-- price -->
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div><span class="text-dark">Rp. {{ number_format($hargaHariIni, 0, ',', '.') }}</span>
                                            </div>
                                        <!-- btn -->
                                        <div>
                                            <a>
                                                @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                    @php
                                                    $perubahan = $hargaHariIni - $hargaKemarin;
                                                    @endphp
                                                    @if ($perubahan > 0)
                                                    <span class="badge bg-danger"><b>Naik &nbsp;</b> <i class="fa-solid fa-arrow-up"></i></button></small></span>
                                                    @elseif ($perubahan < 0)
                                                    <span class="badge bg-success"><b>Turun &nbsp;</b> <i class="fa-solid fa-arrow-down"></i> </button></span>
                                                    @else
                                                    <span class="badge bg-warning"><b>Tetap &nbsp;</b><i class="fa-solid fa-equals"></i></button></span>
                                                    @endif
                                                @else

                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

            @else

                    @foreach ($filterDataAwalPasar as $komoditi)
                        <div class="item">
                            <!-- item -->
                            <div class="card card-product mb-lg-4">
                                <div class="card-body">
                                        @php
                                            $hargaHariIni = null;
                                        @endphp
                                        @foreach ($komoditi->gabungandata as $hargaBarangPasar)
                                            @if ($hargaBarangPasar->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                                @php
                                                    $hargaHariIni = $hargaBarangPasar->average_harga;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @php
                                    $hargaKemarin = null;
                                    @endphp
                                    @foreach ($komoditi->gabungandata as $hargaBarangKemarin)
                                        @if ($hargaBarangKemarin->tanggal_input == Carbon\Carbon::yesterday()->format('Y-m-d'))
                                            @php
                                                $hargaKemarin = $hargaBarangKemarin->average_harga;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @php
                                    $hargaHariIni = null;
                                    @endphp
                                    @foreach ($komoditi->gabungandata as $hargaBarangHariIni)
                                        @if ($hargaBarangHariIni->tanggal_input == Carbon\Carbon::today()->format('Y-m-d'))
                                            @php
                                                $hargaHariIni = $hargaBarangHariIni->average_harga;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                        @php
                                            $perubahan = $hargaHariIni - $hargaKemarin;
                                        @endphp

                                    @else

                                    @endif


                                    <!-- badge -->
                                    <div class="text-center position-relative ">
                                        <div class=" position-absolute top-0 start-0 mb-2">
                                        </div>
                                        <!-- img -->
                                        <!-- img -->
                                        <a href="{{ asset('komoditas/' . $komoditi->gambar) }}" target="_blank"> <img src="{{ asset('komoditas/' . $komoditi->gambar) }}"
                                            alt="Gambar {{ $komoditi->id }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        </a>
                                        <!-- action btn -->
                                        <!-- action btn -->
                                        <div class="card-product-action">
                                            <a href="#!" class="btn-action" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="bi bi-eye"
                                                data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                                            </a>
                                            <a href="../pages/shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                                title="Wishlist"><i class="bi bi-heart"></i>
                                            </a>
                                            <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                                title="Compare"><i class="bi bi-arrow-left-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                <!-- title -->
                                <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{ $komoditi->kategori->nama_kategori }}</small></a></div>

                                    <h2 class="fs-6">
                                        <a href="#!" class="text-inherit text-decoration-none">
                                            {{ $komoditi->nama_komoditas }} / {{ $komoditi->satuan->nama_satuan }}
                                        </a>
                                    </h2>

                                <!-- price -->
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div><span class="text-dark">Rp. {{ number_format($hargaHariIni, 0, ',', '.') }}</span>
                                            </div>
                                        <!-- btn -->
                                        <div>
                                            <a>
                                                @if ($hargaKemarin !== null && $hargaHariIni !== null)
                                                    @php
                                                    $perubahan = $hargaHariIni - $hargaKemarin;
                                                    @endphp
                                                    @if ($perubahan > 0)
                                                    <span class="badge bg-danger"><b>Naik &nbsp;</b> <i class="fa-solid fa-arrow-up"></i></button></small></span>
                                                    @elseif ($perubahan < 0)
                                                    <span class="badge bg-success"><b>Turun &nbsp;</b> <i class="fa-solid fa-arrow-down"></i> </button></span>
                                                    @else
                                                    <span class="badge bg-warning"><b>Tetap &nbsp;</b><i class="fa-solid fa-equals"></i></button></span>
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

            @endif
        </div>
    </div>
 </section>
