<section class="page-wrapper shadow border bg-light">
  <div class="page-app">
    <div
    class="header-app d-flex align-items-center justify-content-start py-1 px-3"
    >
    <a class="btn fs-22px" href="<?php echo base_url('/institution');?>"
      ><i class="icon bi bi-arrow-left"></i
      ></a>
      <div
      class="header-app-title text-center w-75 text-dark fw-800 ls-sm fs-20px text-capitalize"
      >
      <?php echo $data['title'];?>
    </div>
  </div>
  <div class="content mt-3 has-header">
    <div class="col-10 m-auto">
      <div class="container p-0">
        <h3 class="text-dark fw-700">Buat Laporan</h3>
        <p class="mt-3">Apa yang ingin anda laporkan?</p>
      </div>
      <div class="container mt-4 p-0">
        <form id="formReport">
          <input type="hidden" name="institution" value="<?php echo $data['id'];?>">
          <div class="form-group mb-3">
            <label class="form-label text-dark fw-600 fs-14px"
            >Judul Pelaporan</label
            >
            <input
            name="title"
            type="text"
            required
            placeholder="Tulis Judul"
            class="form-control form-control-lg bg-lighter rounded-lg"
            />
          </div>
          <div class="form-group mb-3">
            <label class="form-label text-dark fw-600 fs-14px"
            >Isi Pelaporan</label
            >
            <textarea
            name="report"
            required
            placeholder="Keterangan lengkap pelaporan"
            class="form-control form-control-lg bg-lighter rounded-lg"
            ></textarea>
          </div>
          <div class="form-group mb-3 mt-5">
            <div class="mt-5">
              <button
              type="submit"
              class="btn btn-lg bg-app ls-sm fw-bold text-white w-100 text-uppercase rounded-xl"
              >
              Kirim Laporan
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>

<div
class="modal fade"
id="modalReportSuccess"
tabindex="-1"
aria-hidden="true"
>
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-body">
      <div class="box-image">
        <img class="sm" src="<?php echo base_url('/assets/images/logo.png');?>" />
      </div>
      <div class="text-center mt-2">
        <div class="text-app fw-600 fs-15px mb-2">
          Laporan berhasil dikirim!
        </div>
        <p class="mb-1">Terima kasih atas partisipasimu.</p>
        <p class="mb-0">Laporan kamu sedang kami proses.</p>
        <div class="box-image mt-3">
          <img class="sm" src="<?php echo base_url('/assets/images/loading.png');?>" />
        </div>
      </div>
    </div>
  </div>
</div>
</div>