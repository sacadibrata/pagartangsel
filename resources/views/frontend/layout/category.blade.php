 <!-- section category -->
 <section class="my-lg-12 my-8">
    <div class="container ">
         <div class="row align-items-center mb-6">
             <div class="col-10 ">
                 <div>
                 <!-- heading    -->
                 <h3 class="align-items-center d-flex h4">
                    <lottie-player src="https://lottie.host/46b32697-fe73-4ce3-8652-e8ffcaa47184/tlkJwsgjfu.json"
                    background="##FFFFFF" speed="1" style="width: 80px; height: 80px" loop autoplay direction="1"
                    mode="normal"></lottie-player>
                    <span class="ms-3 mt-1">Distributor</span>
                </h3>
                 </div>
             </div>
             <div class="col-2">
                 <div class="slider-arrow  slider-8-columns-arrow" id="slider-8-columns-arrows"></div>
             </div>
         </div>
         <div class="row g-6">
             <div class="col-12">
                 <div class="position-relative">
                     <div class="slider-8-columns " id="slider-8-columns">
                         <!-- item -->
                         @foreach ($distributors as $item)
                         <div class="item">
                             <!-- item -->

                                 <!-- card -->
                                 <div class="card bg-snow mb-3 card-lift shadow">
                                     <div class="card-body text-center py-6 text-center">
                                         <div class="my-5">
                                             <a href="{{ asset('kategori/' . $item->gambar_kategori) }}" target="_blank"><img src="{{ asset('kategori/' . $item->gambar_kategori) }}"
                                                 class="icon-shape icon-sm" alt="Gambar Kategori" width="100"></a>
                                         </div>
                                         <!-- text -->
                                         <div><h6><small><a href="{{ route('distributors.show', $item->id) }}"
                                            class="text-decoration-none text-inherit">{{ $item->nama_kategori }}</a></small></h6></div>
                                     </div>
                                 </div>
                         </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
    </div>
 </section>
