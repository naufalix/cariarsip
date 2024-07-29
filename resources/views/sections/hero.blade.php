<style>
  #hero {  
    padding: 100px 0px 50px 0px;
    height: 500px;
  }
</style>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
  <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">Selamat datang <span>CARIARSIP</span></h2>
        <p class="animate__animated animate__fadeInUp">Cariarsip adalah Suatu Sistem pencarian arsip sebagai saranan pemberian pelayanan informasi arsip yang lengkap, akurat, mudah dan cepat.</p>
        <div class="row col-12 justify-content-center animate__animated animate__fadeInUp">
          <div class="col-12 col-md-8">
            <input id="keyword" type="text" class="form-control m-2 py-2 px-4" placeholder="Masukkan keyword..." style="border-radius: 20px">
          </div>
          <div class="col-12 col-md-1">
            <a href="#" class="btn-get-started m-2" onclick="setSearchValue()">CARI</a>
          </div>
        </div>
      </div>
    </div>

    {{-- <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
    </a> --}}

  </div>
</section><!-- End Hero -->