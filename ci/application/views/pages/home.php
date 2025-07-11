<section class="page-wrapper shadow border bg-light">
  <div class="page-app">
    <div
    class="header-app d-flex align-items-center justify-content-start py-1 px-3"
    >
    <div class="box-image">
      <a class="btn" href="<?php echo base_url('/');?>"
        ><img class="xs" src="assets/images/logo.png"
        /></a>
      </div>
    </div>
    <div class="content mb-5 mt-4 has-header">
      <div class="col-11 m-auto">
        <div class="container mb-4">
          <!-- Wrapper Swiper -->
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <!-- Slide 1 -->
              <div class="swiper-slide">
                <img src="assets/images/kuburaya.jpg" alt="KubuRaya" />
              </div>
              <div class="swiper-slide">
                <img src="assets/images/kuburaya2.jpg" alt="KubuRaya" />
              </div>
            </div>

            <!-- Tombol prev & next -->
            <div class="swiper-custom-buttons">
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>

            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
      <div class="col-10 m-auto">
        <div class="container">
          <div class="text-center">
            <h1 class="text-dark fw-700">
              Selamat Datang di Lapor Bupati Kuburaya 👋
            </h1>
            <p class="mt-3">Apa yang ingin Anda laporkan hari ini?</p>
          </div>
        </div>
        <div class="container mt-4">
          <div class="text-center">
            <a
            href="<?php echo base_url('/institution');?>"
            class="btn btn-lg bg-app ls-sm fw-bold text-white w-100 text-uppercase rounded-xl"
            >Lapor</a
            >
          </div>
        </div>
      </div>
    </div>
    
    <?php $this->load->view('./layout/menu', ['is_menu' => 'home']);?>
</div>
</section>

<div id="initScriptHome">
<script>
  $(document).ready(async function(){
    await initSwiper('mySwiper');
    return removeInitScript('initScriptHome');
  })  
</script>
</div>