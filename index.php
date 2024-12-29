<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DISNAKER SUMENEP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">DISNAKER</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Pelayanan</a></li>
          <?php
          if (isset($_SESSION['nama'])) {
            echo "<li><a href='#portfolio'>Berita</a></li>";
          }
          ?>
          <li><a href="#team">Profil</a></li>

          </li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="btn-getstarted" href="login.php">Get Started</a> -->
      <!-- Button trigger modal -->
      <?php
      if (!isset($_SESSION['nama'])) {
        echo "<button type='button' class='btn btn-getstarted' data-bs-toggle='modal' data-bs-target='#modalLogin'>";
        echo "Login";
        echo "</button>";
      } else {
        echo "<a style='margin-left: 25px; color:#fff;' class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>";
        echo $_SESSION['nama'];
        echo "</a>";

        echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
        echo "<li><a class='dropdown-item' href='logout.php'>Logout</a></li>";
        echo "</ul>";
      }
      ?>

    </div>
  </header>

  <main class="main">

    <!-- Modal Login -->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLoginLabel">Login!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="login.php" method="post">
              <label for="username">Username:</label><br>
              <input class="form-control" type="text" id="username" name="username" required><br>
              <label for="password">Password:</label><br>
              <input class="form-control" type="password" id="password" name="password" required><br>
              <input class="form-control float-end btn btn-primary" type="submit" value="Login">
            </form>
          </div>
          <div class="modal-footer">
            Tidak mempunyai akun?<a href="#modalDaftar" data-bs-toggle="modal"> Daftar
              Sekarang!</a><br>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Daftar -->
    <div class="modal fade" id="modalDaftar" tabindex="-1" aria-labelledby="modalDaftarLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalDaftarLabel">Daftar!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="register.php" method="post">
              <label for="username">Username:</label><br>
              <input class="form-control" type="text" id="username" name="username" required><br>
              <label for="password">Password:</label><br>
              <input class="form-control" type="password" id="password" name="password" required><br>
              <label for="email">Email:</label><br>
              <input class="form-control" type="text" id="email" name="email" required><br>
              <label for="nama">Nama:</label><br>
              <input class="form-control" type="text" id="nama" name="nama" required><br>
              <input class="form-control float-end btn btn-primary" type="submit" value="Daftar">
            </form>
          </div>
          <!-- <div class="modal-footer">
            Tidak mempunyai akun?<a href=""> Daftar Sekarang!</a><br>
          </div> -->
        </div>
      </div>
    </div>

    <!-- Modal Add Berita -->
    <div class="modal fade" id="modalBerita" tabindex="-1" aria-labelledby="modalBeritaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalBeritaLabel">Tambah Berita</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <label for="nama">Nama / Caption</label><br>
              <input class="form-control" type="text" id="nama" name="nama" required><br>
              <label for="link">Link Berita</label><br>
              <input class="form-control" type="text" id="link" name="link" required><br>
              <label for="gambar">Gambar</label><br>
              <input class="form-control" type="file" id="gambar" name="gambar" required><br>
              <input class="form-control float-end btn btn-primary" type="submit" value="Tambah">
            </form>
          </div>
          <!-- <div class="modal-footer">
            Tidak mempunyai akun?<a href=""> Daftar Sekarang!</a><br>
          </div> -->
        </div>
      </div>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Dinas Ketenagakerjaan Kabupaten Sumenep</h1>
            <p>Siap Kerja !</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Lebih Mengenal</a>
              <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                  Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          <div class="col-lg-6 order-1 order-lg-2 pemkab-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/pemkab-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="zoom-in">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>Dinas Ketenagakerjaan Kabupaten Sumenep merupakan salah satu Perangkat Daerah (PD) Kabupaten Sumenep yang
              menjalankan kebijakan pembangunan Pemerintah Kabupaten Sumenep sebagai Penyelenggaraan Urusan Pemerintah
              di Bidang Ketenagakerjaan.</p>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>Dinas Ketenagakerjaan Kabupaten Sumenep telah beberapa kali mengalami perubahan nomenklatur seiring
              perkembangan dan perubahan kebijakan birokrasi pemerintahan menurut peraturan perundang-undangan yang
              berlaku antar masa ke masa, dahulu bernama Dinas Tenaga Kerja dan Transmigrasi, kemudian melebur menjadi
              satu instansi dengan Dinas Penanaman Modal Perizinan Terpadu dan Tenaga Kerja, namun saat ini terhitung
              mulai tanggal 1 Januari 2024 berdiri sendiri menjadi Dinas Ketenagkerjaan Kabupaten Sumenep berdasarkan
              Peraturan Bupati Sumenep Nomor 68 Tahun 2023.</p>
            <a href="#" class="read-more"><span>Tentang Kami</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us light-background" data-builder="section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><strong>Visi</strong> <span>Dan</span> <strong>Misi</strong></h3>
              <p>
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">

                <h3><strong>Visi</strong></h3>
                <div class="faq-content">
                  <p>“SUMENEP UNGGUL, MANDIRI DAN SEJAHTERA”</p>
                  <p>Unggul</p>
                  <p>Unggul dalam kualitas hidup khususnya pendidikan, kesehatan, dan serapan tenaga kerja Disisi lain,
                    unggul dalam peningkatan ekonomi masyarkat, terbaik dalam pelayanan publik, terdepan dalam
                    menggerakkan partisipasi masyarakat dalam pembangunan dan unggul dalam penataan infrastruktur.</p>
                  <p>Mandiri</p>
                  <p>Mandiri bermakna optimalisasi potensi diri sehingga mampu meminimalisir ketergantungan kepada
                    pemerintah pusat. Demikin juga, masyarakat dalam proses pembangunan tidak semata-mata bergantung
                    kepada pemerintah daerah, namun kemampuan melibatkan swasta/stakeholders yang lain.</p>
                  <p>MANDIRI</p>
                  <p>Sejahtera mempunyai arti semakin meningkatnya kesejahteraan masyarakat, yang diindikasikan dengan
                    meningkatnya pendapatan perkapita penduduk yang berdampak pula pada menurunnya angka kemiskinan dan
                    pengangguran, daya beli masyarakat semakin tinggi serta peningkatan keterjangkauan pelayanan
                    masyarakat dalam memenuhi kebutuhan dasar.
                    mendorong perkembangan usaha kerakyatan yang makin mandiri dan meningkatkan kesejahteraan rakyat,
                    mengurangi kesenjangan atau disparitas antara wilayah kepulauan dan wilayah daratan yang sudah maju,
                    dan berbagai fasilitas layanan publik yang ada di Kabupaten Sumenep juga diharapkan dapat berjalan
                    dengan baik karena didukung kinerja aparat pemerintahan yang bersih, kreatif, inovatif, disiplin,
                    dan akuntabel.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><strong>Misi</strong></h3>
                <div class="faq-content">
                  <p>Misi 1 membangun kualitas sumber daya manusia (sdm) berdaya saing bidang pendidikan, kesehatan dan
                    ketenaga kerjaan</p>
                  <p>Misi 2 meningkatkan kesejahteraan masyarakat melalui penguatan ekonomi berbasis kawasan dari hulu
                    ke hilir</p>
                  <p>Misi 3 mewujudkan tata kelola pemerintahan yang transparan, inovatif dan responsif dalam melayani
                    masyarakat</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="assets/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Why Us Section -->



    </div>

    </div>
    </div>

    </div>

    </section><!-- /Skills Section -->

    <!-- Faq 2 Section -->
    <section id="faq-2" class="faq-2 section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>TUGAS DAN FUNGSI</h2>
        <p>Tugas Pokok</p>
        <p>Membantu Bupati melaksanakan penyusunan perumusan kebijakan teknis dan pelaksanaan kebijakan daerah di Bidang
          Ketenagakerjaan.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <h3>Fungsi</h3>
                <div class="faq-content">
                  <p>1. Perumusan kebijakan di bidang bidang tenaga kerja;</p>
                  <p>2. Pelaksanaan kebijakan di bidang tenaga kerja;</p>
                  <p>3. Pelaksanaan pengolahan data dan sistem informasi, penempatan tenaga kerja dan transmigrasi,
                    pelatihan dan produktifitas kerja, serta hubungan industrial dan jaminan sosial di bidang tenaga
                    kerja;</p>
                  <p>4. Pelaksanaan kajian teknis, monitoring dan evaluasi, pelaporan di tenaga kerja;</p>
                  <p>5. Pelaksanaan administrasi ketatausahaan Dinas; dan</p>
                  <p>6. Pelaksanaan tugas lain yang diberikan oleh Bupati.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->


            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq 2 Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pelayanan</h2>
        <p>Jenis Layanan</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">AKAN</a></h4>
              <p>Pelayanan Rekomendasi TKI untuk tenaga kerja yang akan bekerja ke luar negeri    </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">AKAD</a></h4>
              <p>Pelayanan Rekomendasi Transmigrasi untuk menjadi tenaga kerja luar daerah        </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">Pengaduan</a></h4>
              <p>Pelayanan Pengaduan Perselisihan Hubungan Industrial                             </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">Rekomendasi</a></h4>
              <p>Pelayanan Rekomendasi Klaim BPJS Ketenagakerjaan                                 </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">Rekomendasi</a></h4>
              <p>Pelayanan Rekomendasi Izin Lembaga Pelatihan kerja swasta                        </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">Pelatihan</a></h4>
              <p>Pelayanan Pendaftaran Pelatihan Kerja                                            </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">Pelayanan AK 1 - AK 5 </a></h4>
              <p>Kartu Kuning untuk syarat melamar pekerjaan pada sektor swasta dan pemerntah     </p>
            </div>
          </div><!-- End Service Item -->


          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <h4><a href="" class="stretched-link">E - PKWT</a></h4>
              <p>Sistem pelayanan pencatatan Perjanjian Kerja Waktu Tertentu                      </p>
            </div>
          </div><!-- End Service Item -->


        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Portfolio Section -->
    <?php

    if (isset($_SESSION['nama'])) { ?>
      <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>BERITA TERKAIT</h2>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

              <?php
              $sql = "SELECT nama, gambar, link FROM news";
              $result = $conn->query($sql); 

              // Periksa apakah ada data yang ditemukan
              if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while ($row = $result->fetch_assoc()) {
                  echo '
                      <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                          <img src="assets/img/masonry-portfolio/' . $row["gambar"] . '" class="img-fluid" alt="">
                          <div class="portfolio-info">
                              <h4>' . $row["nama"] . '</h4>
                              <a href="assets/img/masonry-portfolio/' . $row["gambar"] . '" title="' . $row["nama"] . '" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                              <a href="' . $row["link"] . '" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                          </div>
                      </div>
                      ';
                }
              } else {
                echo "0 results";
              }
              ?>

              <!-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Disnaker Tetap Layani Masyarakat Sambil Menunggu Kebijakan Dari Pusat</h4>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-4.jpg" title="App 2"
                  data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="https://sumenepkab.go.id/berita/baca/disnaker-tetap-layani-masyarakat-sambil-menunggu-kebijakan-dari-pusat"
                  title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Warga Sumenep Rata-rata Belum Mengetahui BPJS Ketenagakerjaan</h4>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" title="Product 2"
                  data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                    class="bi bi-zoom-in"></i></a>
                <a href="https://serikatnews.com/warga-sumenep-rata-rata-belum-mengetahui-bpjs-ketenagakerjaan/"
                  title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Optimalkan Pengupahan, Disnaker Sumenep Sosialisasikan UMK Tahun 2022</h4>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" title="Branding 2"
                  data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                    class="bi bi-zoom-in"></i></a>
                <a href="https://www.sumenepkab.go.id/berita/baca/optimalkan-pengupahan-disnaker-sumenep-sosialisasikan-umk-tahun-2022"
                  title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div> -->

            </div><!-- End Portfolio Container -->

          </div>

          <?php

          if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'admin') { ?>

              <div class="d-flex justify-content-center mt-4">
                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalBerita'>
                  <i class="bi bi-plus-lg"></i>
                  Tambah Berita
                </button>
              </div>
          <?php
            }
          }
          ?>

        </div>

      </section><!-- /Portfolio Section -->
    <?php
    }
    ?>

    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pejabat Struktural</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>HERU SANTOSO, S.STP., MH</h4>
                <span>Kepala Dinas </span>
                <p>NIP. 198205092000121004</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>dr. KUSMUNI, M.Kes</h4>
                <span>Sekretaris</span>
                <p>NIP.19690312 200212 1 010</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>EKO FERRYANTO, SE., MM</h4>
                <span>BIDANG PELATIHAN, PRODUKTIFITAS DAN HUBUNGAN INDUSTRIAL</span>
                <p>NIP. 19751125 200801 1 009</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>EKO KURNIA MEDIANTORO, SE., MH</h4>
                <span>BIDANG PENEMPATAN DAN PERLUASAN KESEMPATAN KERJA</span>
                <p>NIP. 19810527 201001 1 004</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->



    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Joni Susanto</h3>
                <h4>Masyarakat</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Pegawainya ramah-ramah dan cekatan.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Widiyanto</h3>
                <h4>Masyarakat</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Kinerja yang diberikan terlihat cukup tulus.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Moh. Iskandar</h3>
                <h4>Wirausahawan</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Cukup memberikan solusi yang membantu.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Jodo Wikoko</h3>
                <h4>Wirausahawan</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Saya puas.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>Faizal Yek</h3>
                <h4>Driver Ojek Online</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Saya cukup terbantu berkat DISNAKER Sumenep.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak Kami</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p>Jln. Dr. Cipto nomor 33 Area Perkantoran Pemkab Sumenep, Sumenep 667766</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Telepon</h3>
                  <p>+62 818-0752-4299</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>disnaker.kabsumenep@gmail.com</p>
                  <p>disnaker.sumenepkab@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=jnsJjsFCr9bcVJGF6" frameborder="0"
                style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Nama</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Pesan</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Kirim Pesan</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">DISNAKER</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jln. Dr. Cipto nomor 33 Area Perkantoran Pemkab Sumenep</p>
            <p>Sumenep 667766</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+62 818-0752-4299</span></p>
            <p><strong>Email:</strong> <span>disnaker.kabsumenep@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Shortcut</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Profil</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
          </ul>
        </div>
      </div>
    </div>

    </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">DISNAKER SUMENEP</strong> <span>All Rights
          Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">Alyan Muhammad</a>
      </div>
    </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>