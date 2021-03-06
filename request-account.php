<?php
require './config/connect.php';
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
  <title>user request</title>
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
  <link rel="stylesheet" href="css/report.css">
</head>

<body>


  <!-- END nav -->

  <section class="home-slider ftco-degree-bg">
    <div class="slider-item">
      <div>
        <?php require "./navbar.php"; ?>

        <div class="container">



        </div>
        <div class="w-100">

        </div>
        <div class="row headerreport">
          <div class="col-md-6">
            <h1 class="reporttext">Request to create account</h1>
          </div>
          <div class="col-md-6">
            <h1 class="reporttext"><?php echo date('D/M/Y'); ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="studentsum">
            <?php
            $sql = "SELECT * FROM request_account";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $num = mysqli_num_rows($query);
            if ($num > 0) {
              while ($row = mysqli_fetch_array($query)) { ?>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['Firstname'] . " " . $row['Lastname']; ?></h5>
                    <p class="card-text"><?php echo $row['Code']." ".$row['Firstname'] . " " . $row['Lastname']."ได้ยื่นคำร้องขอเปิดบัญชีเงินฝากเป็นจำนวน ".$row['Begin_cash']."฿"; ?></p>
                    <a href="./request-page.php?formID=<?php echo $row['FormID']; ?>" class="btn btn-primary">เพิ่มเติม</a>
                  </div>
                </div><br>
              <?php }
            } else { ?>
             
                <h1 class="text-light">- ไม่มีคำร้องเปิดบัญชี</h1>
              
            <?php } ?>
          </div>
        </div>

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