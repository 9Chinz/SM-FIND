<?php
session_start();

if(!isset($_SESSION['hasLogin'])){
  echo "<script>alert('please login !')</script>";
  echo '<meta http-equiv="refresh" content="1; url=./login.php"> ';
  exit();
}
require "./config/connect.php";

$formID = $_GET['formID'];
$sql = "SELECT * FROM request_account WHERE FormID = '$formID'";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$result = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>request page</title>
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
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <?php require "./navbar.php"; ?>
    <!-- END nav -->
    
    <!-- title -->
    <section class="home-slider ftco-degree-bg">
      <div class="slider-item bread-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-10 col-sm-12 ftco-animate mb-4 text-center">
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>request page</span></p>
              <h1 class="mb-3 bread">สร้างบัญชี</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- form -->
    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container bg-light">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">ยืนยันการสร้างบัญชี</h2>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form action="./config/request-page-proc.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="code" value="<?php echo $result['Code']; ?>" placeholder="รหัสนักศึกษา" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="name" value="<?php echo $result['Firstname']." ".$result['Lastname']; ?>" placeholder="ชื่อ-นามสกุล" readonly>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" value="<?php echo $result['Email']; ?>" placeholder="email" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="accountNumber" placeholder="เลขบัญชี" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="bankBook" placeholder="เลขสมุดบัญชี" required>
              </div>
              <div class="form-group">
                <input type="text" step=0.01 class="form-control" value="<?php echo $result['Begin_cash']; ?>" name="cash" placeholder="จำนวนเงินที่ฝากขั้นต้น" min="100" readonly>
              </div>
              <div class="form-group">
                <input type="submit" name="btn-accept" value="ยืนยัน" class="btn btn-success py-3 px-5">
                <input type="submit" name="btn-reject" value="ยกเลิก" class="btn btn-danger py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6" id=""><img src="./images/money.svg" style="height: 90%; width: 90%;" alt=""></div>
        </div>
      </div>
    </section>

    <!-- footer -->
    <?php require "./footer.php"; ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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