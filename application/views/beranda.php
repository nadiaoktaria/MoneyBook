<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MoenyBook - Pembukuan Keuangan Bulanan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/beranda/img/icon.svg" rel="apple-touch-icon">
  <link href="<?= base_url() ?>assets/beranda/img/icon.svg" rel="icon" type="image/x-icon"/>

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/beranda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/beranda/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/beranda/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/beranda/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/beranda/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/beranda/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/beranda/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header-transparent">
    <div class="container">

      <div id="logo" class="pull-left">
        <img src="<?= base_url() ?>assets/beranda/img/logo.svg" alt="">
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Lokasi</a></li>
          <li><a href="<?= base_url('login') ?>">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome To MoneyBook</h1>
      <h2>Website yang akan membantu pembukuan keuangan bulanan Anda</h2>
      <a href="<?= base_url('login') ?>" class="btn-get-started">mulai</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">MoneyBook</h2><br>
            <p><b>Website pembukuan yang selalu siap berinovasi untuk melengkapi kebutuhan pembukuan keuangan Anda.</b></p>
            <p>Website pembukuan keuangan yang dapat digunakan di berbagai bidang usaha dan dapat melakukan pengecekan secara berkala dimanapun dan kapanpun.</p>
          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100">
            <img style="width:100%; hight:100%" src="<?= base_url() ?>assets/beranda/img/about-img.png" alt="">
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Services</h3>
          <p class="section-description">Lihat apa yang kami tawarkan dan kami sediakan untuk pencatatan pembukuan keuangan Anda</p>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><i class="fa fa-desktop"></i></div>
              <h4 class="title">Aman</h4>
              <p class="description">Data Keuangan aman tersimpan dan terenkripsi.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title">Akurat</h4>
              <p class="description">Standar laporan keuangan akuntansi.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><i class="fa fa-paper-plane"></i></div>
              <h4 class="title">Mudah</h4>
              <p class="description">Fitur yang memudahkan kontrol keuangan bisnis.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><i class="fa fa-shopping-bag"></i></div>
              <h4 class="title">Hemat</h4>
              <p class="description">Bebas biaya kebutuhan server konvensional</p>
            </div>
          </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Mulai Mencatat Keuangan</h3>
            <p class="cta-text"> Tujuan utama dari mencatat keuangan adalah memberikan kamu informasi pengeluaran serta pemasukan bulanan yang berdasarkan kemauanmu. </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="<?= base_url('login') ?>">Mulai</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <p class="section-description">Team pengembang yang membangun website pembukuan keuangan yang bernama MoneyBook</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url() ?>assets/beranda/img/team-1.jpg" alt=""></div>
              <h4>Rizkista Ichsan Harnanto</h4>
              <span>D3MI-01 19.02.0347</span>
              <div class="social">
                <a href=""><i class="fa fa-instagram"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-envelope"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="pic"><img src="<?= base_url() ?>assets/beranda/img/team-2.jpg" alt=""></div>
              <h4>Nadia Oktaria</h4>
              <span>D3MI-01 19.02.0372</span>
              <div class="social">
                <a href=""><i class="fa fa-instagram"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-envelope"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="<?= base_url() ?>assets/beranda/img/team-3.jpg" alt=""></div>
              <h4>Hanif Anggraeni</h4>
              <span>D3MI-01 19.02.0407</span>
              <div class="social">
                <a href=""><i class="fa fa-instagram"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-envelope"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="pic"><img src="<?= base_url() ?>assets/beranda/img/team-4.jpg" alt=""></div>
              <h4>Umi Tadzkiroh</h4>
              <span>D3MI-01 19.02.0349</span>
              <div class="social">
                <a href=""><i class="fa fa-instagram"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-envelope"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Lokasi</h3>
          <p class="section-description">Kami belum memiliki kantor dan masih dalam tahap pencarian investor agar website ini dapat berkembang</p>
        </div>
      </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.97077191126!2d110.33982534474266!3d-7.803249010409012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1626852588257!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

      <!-- <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>
              <div>
                <i class="fa fa-envelope"></i>
                <p>info@example.com</p>
              </div>
              <div>
                <i class="fa fa-phone"></i>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>
            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
        </div>
      </div> -->
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright © 2021<a href="#hero"> MoneyBook</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/beranda/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/superfish/superfish.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/hoverIntent/hoverIntent.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url() ?>assets/beranda/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/beranda/js/main.js"></script>

</body>

</html>