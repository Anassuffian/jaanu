<?php
include 'db.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Anas - Index</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-scrolled">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.html">CAR WASH AND SERVICES</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/ims6078ag8/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="/ims6078ag8/services.php">Services</a></li>
          <li><a class="nav-link scrollto" href="/ims6078ag8/work.php">Work</a></li>
          <li><a class="nav-link scrollto" href="/ims6078ag8/booking.php">booking</a></li>
          <li><a class="nav-link scrollto" href="/ims6078ag8/users.php">Users</a></li>
          <li>
            <?php
            if ($logged_in) {
            ?>
              <a class="nav-link scrollto" href="/ims6078ag8/logout.php">Logout</a>
            <?php
            } else {
            ?>
              <a class="nav-link scrollto" href="/ims6078ag8/login.php">Login</a>
            <?php
            }
            ?>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <div id="hero" class="hero route bg-image" style="background-image: url(/ims6078ag8/assets/img/hero-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="hero-title mb-4">
            <?php
            if ($logged_in) {
              echo $_SESSION["name"];
            } else {
              echo "REGISTER MEMBER NOW";
            }
            ?>
          </h1>
          <p class="hero-subtitle">
            <span class="typed" data-typed-items="WELCOME TO, CAR WASH &, SERVICES,"></span>
          </p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box">
            <p class="copyright">
              &copy; Copyright <strong>CarWashServices</strong> <?php echo date("Y"); ?>
              . All Rights Reserved
            </p>

          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>