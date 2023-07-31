<?php
// Cek apakah sesi sudah aktif sebelum memulai sesi
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PhotoFolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASEURL; ?>/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/frontend/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= BASEURL; ?>/frontend/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="<?= BASEURL; ?>/" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1>MNO Photography Studio</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= BASEURL; ?>/">Home</a></li>
          <li><a href="<?= BASEURL; ?>/home/portfolio">Portofolio</a></li>
          <li><a href="<?= BASEURL; ?>/home/services">Services</a></li>
          <li><a href="<?= BASEURL; ?>/home/contact">Contact</a></li>
            <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true): ?>
                <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']): ?>
                    <li><a href="<?= BASEURL; ?>/dashboard">Dashboard </a>
                    </li>
                <?php endif; ?>
                <li class="dropdown"><a href="#" class="dropdown-toggle color-light" data-toggle="dropdown"> Hello <?= $_SESSION['username'] ?> </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= BASEURL; ?>/auth/logout"  class="color-light">Logout </a>
                        </li>
                    </ul>
                </li>
            <?php else: ?>
                <!-- Jika pengguna belum login -->
                <li><a href="<?= BASEURL; ?>/auth">Login </a>
                </li>
            <?php endif; ?>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->