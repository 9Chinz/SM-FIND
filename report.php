<?php
session_start();
require "./config/connect.php";
if (!isset($_SESSION['hasLogin'])) {
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
            <h1 class="reporttext">Classroom <span><?php echo $_SESSION['level']; ?></span></h1>
          </div>
          <div class="col-md-6">
            <h1 class="reporttext"><?php echo Date("D/M/Y"); ?></h1>
          </div>
        </div>
        <div class="row">
          <div class=" studentsum">
            <div class="col-md-4 allstudent">

              <?php
              $sql = "SELECT * FROM `member` WHERE Userlevel = 'student'";
              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              $row = mysqli_num_rows($result);
              ?>

              <h1>นักศึกษาทั้งหมด</h1>
              <h1><?php echo $row; ?> <span>คน</span></h1>
            </div>

            <div class="col-md-4  allstudent">
              <h1>นักศึกษาที่ฝากเเล้ว</h1>
              <h1>50 <span>คน</span></h1>
            </div>

            <div class="col-md-4  allstudent">
              <h1>ยอดรวม</h1>
              <h1>20000 <span>บาท</span></h1>
            </div>
          </div>
        </div>

        <?php
        $dept = $_SESSION['dept'];
        $section = $_SESSION['section'];
        $class = $_SESSION['class'];
        $room = $_SESSION['room'];
        if($_SESSION['specialStatus'] == "treasurer"){
          $status = 0;
        }elseif($_SESSION['specialStatus'] == "sub-headroom" || $_SESSION['specialStatus'] == "headroom"){
          $status = 1;
        }elseif($_SESSION['specialStatus'] == "teacher"){
          $status = 2;
        }elseif($_SESSION['specialStatus'] == "teller"){
          $status = 3;
        }elseif($_SESSION['specialStatus'] == "bank-account"){
          $status = 4;
        }
        $sql = "SELECT member_trans.TransID, member.MemberCode, member.Firstname, member.Lastname, member_account.Account_number, member_trans.Date, member_trans.Amount, member_trans.Status
        FROM member
        INNER JOIN member_account ON  member.MemberID = member_account.MemberID
        INNER JOIN member_trans ON member_account.AccountID = member_trans.AccountID
        WHERE member_trans.Status = '$status' AND member.Dept = '$dept' AND member.Section = '$section' AND member.Class = '$class' AND member.Room = '$room'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $num = mysqli_num_rows($query);
        ?>
        <div class="col table-responsive ">
          <table class="table tablewhite">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">รหัสนักศึกษา</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">เลขที่บัญชี</th>
                <th scope="col">จำนวนเงิน</th>
                <th scope="col">ตรวจสอบ</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $n = 1;
              if ($num > 0) {
                while ($row = mysqli_fetch_array($query)) { ?>
                  <tr>
                    <th scope="row"><?php echo $n; ?></th>
                    <td><?php echo $row['MemberCode']; ?></td>
                    <td><?php echo $row['Firstname']." ".$row['Lastname']; ?></td>
                    <td><?php echo $row['Account_number']; ?></td>
                    <td><?php echo $row['Amount']; ?><span>฿</span></td>
                    <td> <input type="checkbox" id="validate" name="fooby[1][]"> <input type="checkbox" id="validate" name="fooby[1][]"> </td>
                  </tr>
                <?php $n++; }
              } else { ?>
                <tr>
                  <th scope="row">-</th>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-<span>-</span></td>
                  <td> <input type="checkbox" id="validate" name="fooby[1][]"> <input type="checkbox" id="validate" name="fooby[1][]"> </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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