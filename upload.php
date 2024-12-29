<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $link = $_POST['link'];

    // Memproses file gambar yang diunggah
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "assets/img/masonry-portfolio/";  // Direktori penyimpanan file
    $target_file = $target_dir . basename($gambar);

    // Memeriksa apakah file gambar adalah gambar yang valid
    $check = getimagesize($_FILES['gambar']['tmp_name']);
    if ($check !== false) {
        // Pindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            // Persiapkan pernyataan SQL dengan PDO
            $stmt = $conn->prepare("INSERT INTO news (nama, link, gambar) VALUES (?, ?, ?)");
            // Mengikat parameter ke pernyataan SQL
            $stmt->bind_param("sss", $nama, $link, $gambar);

            // Eksekusi pernyataan
            $stmt->execute();

            $_SESSION['status'] = 'Berita berhasil disimpan!';
            header("refresh:3;url=index.php");
        } else {
            $_SESSION['status'] = 'Terjadi kesalahan saat mengunggah gambar.';
            header("refresh:3;url=index.php");
        }
    } else {
        $_SESSION['status'] = 'File bukan gambar yang valid.';
        header("refresh:3;url=index.php");
    }
} else {
    $_SESSION['status'] = 'Anda tidak boleh mengakses halaman ini.';
    header("refresh:3;url=index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            /* Full screen height */
        }
    </style>

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

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">DISNAKER</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#services">Pelayanan</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Profil</a></li>

                    </li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="login.php">MULAI</a>

        </div>
    </header>

    <main class="main">

        <!-- Modal -->
        <div class="modal fade" id="autoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                        <?php
                        if (isset($_SESSION['status'])) {
                            if ($_SESSION['status'] == 'Berita berhasil disimpan!') {
                                echo "<i class='text-center bi bi-check-circle-fill text-success' style='font-size: 8rem;'></i>";
                                echo "<h1 class='text-center mb-10 mt-10'>" . $_SESSION['status'] . "</h1>";
                            } else {
                                echo "<i class='text-center bi bi-x-circle-fill text-danger' style='font-size: 8rem;'></i>";
                                echo "<h1 class='text-center mb-10 mt-10'>" . $_SESSION['status'] . "</h1>";
                            }
                        }
                        ?>
                    </div>
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
                            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
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

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login</title>
                <link rel="stylesheet" href="styles.css">
            </head>

            <body>
                <!-- <div class="login-container">
          <h2>Login</h2>
          <form method="POST" action="">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
          </form>
        </div> -->
            </body>

</body>

<div class="col-lg-2 col-md-3 footer-links">
    <h4>Useful Links</h4>
    <ul>
        <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
        <li><i class="bi bi-chevron-right"></i> <a href="#">Profil</a></li>
        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
    </ul>
</div>
</div>
</div>

</div>
</div>

<div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">DISNAKER SUMENEP</strong> <span>All Rights Reserved</span></p>
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
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('autoModal'), {
            backdrop: 'static', // Prevent closing by clicking outside
            keyboard: false // Prevent closing with the keyboard
        });
        myModal.show();

        setTimeout(function() {
            myModal.hide();
        }, 3000); // 2000 milliseconds = 2 seconds
    });
</script>

</html>