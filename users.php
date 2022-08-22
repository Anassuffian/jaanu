<?php
include 'db.php';

if (isset($_GET['delete'])) {
  $sql = "DELETE FROM user WHERE id={$_GET['delete']}";
  $result = mysqli_query($connection, $sql);
}

if (isset($_SESSION['id'])) {
  $sql = "SELECT * FROM user WHERE id!={$_SESSION['id']}";
} else {
  $sql = "SELECT * FROM user";
}

$result = mysqli_query($connection, $sql);
$count = mysqli_num_rows($result)
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Anas - Users</title>
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
      <h1 class="logo"><a href="index.html">CAR WASH & SERVICES</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/ims6078ag8/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="/ims6078ag8/services.php">Services</a></li>
          <li><a class="nav-link scrollto" href="/ims6078ag8/work.php">Work</a></li>
          <li><a class="nav-link scrollto" href="/ims6078ag8/booking.php">booking</a></li>
          <li><a class="nav-link scrollto active" href="/ims6078ag8/users.php">Users</a></li>
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

  <main id="main" class="mt-5">
    <!-- ======= Users Section ======= -->
    <section id="users" class="users-mf pt-5 route" style="background-image: url(assets/img/counters-bg.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">Users</h3>
              <p class="subtitle-a">
                WELCOME TO CAR SPA AND SERVICE
              </p>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- User Box -->
          <?php
          if ($count == 0) {
          ?>
            <div class="col-md-4 offset-4">
              <div class="service-box">
                <div class="service-ico">
                  <span class="ico-circle"><i class="bi bi-person-x-fill"></i></span>
                </div>
                <div class="service-content">
                  <p class="s-description text-center">
                    Uh-oh! There are no other users!
                  </p>
                </div>
              </div>
            </div>
            <?php
          } else if ($count == 1) {
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <div class="col-md-4 offset-4">
                <div class="service-box">
                  <div class="service-ico">
                    <span class="ico-circle"><i class="bi bi-person-fill"></i></span>
                  </div>
                  <div class="service-content">
                    <h2 class="s-title"><?php echo $row['name']; ?></h2>
                    <p class="s-description text-center">
                      <?php echo $row['email']; ?>
                    </p>
                    <?php
                    if ($logged_in) {
                    ?>
                      <!-- <button type="button" class="button button-a button-big button-rouded">
                      View
                    </button> -->
                      <a href="users.php?delete=<?php echo $row['id']; ?>" type="button" class="button button-b button-big button-rouded">
                        Delete
                      </a>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            <?php
            }
          } else {
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <div class="col-md-4">
                <div class="service-box">
                  <div class="service-ico">
                    <span class="ico-circle"><i class="bi bi-person-fill"></i></span>
                  </div>
                  <div class="service-content">
                    <h2 class="s-title"><?php echo $row['name']; ?></h2>
                    <p class="s-description text-center">
                      <?php echo $row['email']; ?>
                    </p>
                    <?php
                    if ($logged_in) {
                    ?>
                      <!-- <button type="button" class="button button-a button-big button-rouded">
                      View
                    </button> -->
                      <a href="users.php?delete=<?php echo $row['id']; ?>" type="button" class="button button-b button-big button-rouded">
                        Delete
                      </a>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>
          <!-- End User Box -->
        </div>
      </div>
    </section>
    <!-- End Services Section -->
  </main>
  <!-- End #main -->

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