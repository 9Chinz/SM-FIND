<?php
session_start();
if(!isset($_SESSION['hasLogin'])){
    echo "<script>alert('please login !')</script>";
    echo '<meta http-equiv="refresh" content="1; url=./login.php"> ';
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>SM FIN D</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/depositstyle.css">
</head>

<body>

  <?php require "./navbar.php"; ?>
  <!-- END nav -->

  <section class="home-slider ftco-degree-bg">
    <div class="slider-item">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 ftco-animate text-center">
            <h1 class="mb-4">
              ฝากเงิน
            </h1>
            <div class="row">
              <span class="col">
                <form action="./config/deposit-process.php" method="POST">
                  <div class="depositbox">
                    <img src="" alt=""><input type="text" name="account-number" value="<?php echo $_SESSION['accountNumber']; ?>" placeholder="ใส่เลขที่บัญชี" class="form-control">
                  </div>
                  <div class="depositbox">
                    <img src="" alt=""><input type="text" name="deposit-cash" placeholder="ใส่จำนวนเงิน.." class="form-control">
                  </div>
                  <input type="submit" name="btn-deposit" value="กดยืนยัน" class="summit">
                </form>
              </span>

            </div>
            <div class="w-100">

            </div>
            <div class="col">
              <div class="">
                <span class="">หยดน้ำที่คาดว่าจะได้รับ<p class="bluepoint"></p><img src="" alt=""></span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- END slider -->


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>