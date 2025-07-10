<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=480, user-scalable=no" />
    <meta name="theme-color" content="#FFFFFF" />
    <meta name="description" content="Lapor Bupati" />
    <meta name="keywords" content="Lapor Bupati" />
    <meta name="author" content="LoisPoetra" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph Meta -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Lapor Bupati" />
    <meta property="og:description" content="Lapor Bupati" />
    <meta property="og:image" content="<?= base_url('assets/images/logo.png') ?>" />
    <meta property="og:url" content="<?= base_url() ?>" />

    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Lapor Bupati" />
    <meta name="twitter:description" content="Lapor Bupati" />
    <meta name="twitter:image" content="<?= base_url('assets/images/logo.png') ?>" />

    <title>Lapor Bupati</title>

    <!-- Icons -->
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('apple-touch-icon.png') ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon-32x32.png') ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon-16x16.png') ?>" />
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('android-chrome-192x192.png') ?>" />
    <link rel="icon" type="image/png" sizes="512x512" href="<?= base_url('android-chrome-512x512.png') ?>" />
    <link rel="manifest" href="<?= base_url('site.webmanifest') ?>" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/animation.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/font.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/width.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/height.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/color.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>" />

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/aos/aos.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" />
  </head>
  <body class="index-page">
    <div id="app">
      <main class="main" id="main-app">
        <?php
        $isData = (isset($data)) ? $data : [];
        $this->load->view($content, ['data' => $isData]);
        ?>
      </main>
    </div>

    <!-- VENDOR JS -->
    <script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
  </body>
</html>
