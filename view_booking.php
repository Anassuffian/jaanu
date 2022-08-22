<?php
include 'db.php';

if (!$logged_in) {
  header("Location: login.php");
  exit();
}

$sqlService = "SELECT * FROM service";
$resultService = mysqli_query($connection, $sqlService);

if (isset($_GET['id'])) {
  $sqlBooking = "SELECT * FROM booking WHERE id={$_GET['id']}";
  $resultBooking = mysqli_query($connection, $sqlBooking);
  $rowBooking  = mysqli_fetch_array($resultBooking);
  if (!is_array($rowBooking)) {
    header("Location: booking.php");
  } else {
    $customer_id = $rowBooking['customer_id'];
    $sqlCustomer = "SELECT * FROM customer WHERE id={$customer_id}";
    $resultCustomer = mysqli_query($connection, $sqlCustomer);
    $rowCustomer = mysqli_fetch_array($resultCustomer);
  }
}

if (isset($_POST['saveButton'])) {
  $id = $_POST['id'];
  $date = $_POST['date'];
  $service_id = $_POST['service_id'];

  $sql = "UPDATE booking SET date='{$date}', service_id='{$service_id}' WHERE id='{$id}'";
  $result = mysqli_query($connection, $sql);
  if (!$result) {
    die("Database connection not established. " . mysqli_error($connection));
  }

  echo '<script>alert("Your booking has been updated.");window.location.href="booking.php";</script>';
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "DELETE FROM booking WHERE id='{$id}'";
  $result = mysqli_query($connection, $sql);
  if (!$result) {
    die("Database connection not established. " . mysqli_error($connection));
  }

  echo '<script>alert("Your booking has been deleted.");window.location.href="booking.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Anas - Create Booking</title>
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

  <main id="main" class="mt-5">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/overlay-bg.jpg)">
      <div class="overlay-mf"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col">
                  <div class="title-box-2">
                    <h5 class="title-left">View Booking</h5>
                  </div>
                  <div>
                    <form action="" method="post" role="form" class="email-form">
                      <div class="row">
                        <input type="hidden" name="id" value="<?php echo $rowBooking['id'] ?>" />
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $rowCustomer['name'] ?>" disabled />
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="number" class="form-control" name="phone" id="phone" value="<?php echo $rowCustomer['phone'] ?>" min="0" step="1" disabled />
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" class="form-control" name="plate" id="plate" value="<?php echo $rowCustomer['plate'] ?>" disabled />
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" class="form-control" name="model" id="model" value="<?php echo $rowCustomer['model'] ?>" disabled />
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="date" class="form-control" name="date" id="date" value="<?php echo $rowBooking['date'] ?>" min="<?php echo date('Y-m-d'); ?>" required />
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <select class="form-control" name="service_id" id="service_id">
                              <option disabled value="">Please select your desired service</option>
                              <?php
                              while ($rowService = mysqli_fetch_array($resultService)) {
                              ?>
                                <option value="<?php echo $rowService['id'] ?>" <?php if ($rowService['id'] == $rowBooking['service_id']) echo "selected" ?>>
                                  <?php echo $rowService['name'] ?>
                                </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12 text-center my-3">
                          <div class="error-message"><?php echo $error_message; ?></div>
                        </div>
                        <div class="col-md-12 text-center d-flex justify-content-between">
                          <button type="submit" name="saveButton" class="button button-a button-big button-rouded ml-5">
                            Save
                          </button>
                          <a href="view_booking.php?delete=<?php echo $rowBooking['id'] ?>" type="button" name="deleteButton" class="button button-b button-big button-rouded mr-5">
                            Delete
                          </a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->
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