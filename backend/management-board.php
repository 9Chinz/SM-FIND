<?php
session_start();
require "../config/connect.php";
$date = date("Y-m-d");



?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SM FIN D Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "./management-nav.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../index.php">
                  <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                  Home
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">information</h1>
          </div>
          <?php
          $sql = "SELECT *,SUM(`Amount`) AS Result FROM `member_trans` WHERE `Status` = '5' AND `Date` = '$date'";
          $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          $sumResult = mysqli_fetch_array($query);
          ?>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">เงินฝากรายวัน</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (!empty($sumResult['Result'])) {
                                                                            echo $sumResult['Result']."฿";
                                                                          } else {
                                                                            echo "0฿";
                                                                          } ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            //for week
            
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">ยอดเงินฝากรายสัปดาห์</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0฿</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            //for week
            $sql = "SELECT * FROM `member_trans` WHERE `Status` = '5' AND `Date` = '$date'";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $numRow = mysqli_num_rows($query);
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">นักศึกษาที่ฝากวันนี้</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $numRow; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            //for week
            $sql = "SELECT * FROM `member_trans` WHERE `Status` < '5' AND `Date` = '$date'";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $numRow = mysqli_num_rows($query);
            ?>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">รอการยืนยันทำรายการ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numRow; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="col-lg-12">

            <div class="card shadow  position-relative">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ค้นหาห้องเรียน</h6>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="card-body">
                  <?php include "./search_bar.php"; ?>
                  <input type="submit" class="btn btn-primary" value="ค้นหา" name="btnSearch">
              </form>
            </div>


          </div>
        </div>

        <?php
        
        

        
        ?>
        <div class="card shadow mb-4 table_style">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ตาราง</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">เลขที่บัญชี</th>
                    <th scope="col">จำนวนเงิน</th>
                    <th scope="col" colspan="2">สถานะการฝาก</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($_POST['btnSearch'])) {
                    $dept = $_POST['dept'];
                    $section = $_POST['section'];
                    $class = $_POST['class'];
                    $room = $_POST['room'];
          
                    $sql = "SELECT member_trans.TransID, member.MemberCode, member.Firstname, member.Lastname, member_account.Account_number, member_trans.Date, member_trans.Amount, member_trans.Status
                    FROM member
                    INNER JOIN member_account ON  member.MemberID = member_account.MemberID
                    INNER JOIN member_trans ON member_account.AccountID = member_trans.AccountID
                    WHERE member.Dept = '$dept' AND member.Section = '$section' AND member.Class = '$class' AND member.Room = '$room' AND Date = '$date'";
          
                    if ($_SESSION['userlevel'] == "bank-account") {
                      $status = 5;
                    } else {
                      $status = 4;
                    }
                    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  

                  $n = 1;
                    while ($row = mysqli_fetch_array($query)) { 
                      if(!empty($row['Status'])){
                        if($row['Status'] == "$status"){ ?>
                        <tr>
                        <th scope="row"><?php echo $n; ?></th>
                        <td><?php echo $row['MemberCode']; ?></td>
                        <td><?php echo $row['Firstname'] . " " . $row['Lastname']; ?></td>
                        <td><?php echo $row['Account_number']; ?></td>
                        <td><?php echo $row['Amount']; ?><span>฿</span></td>
                        <td>สถานะการฝาก</td>
                      </tr>
                      <?php }} ?>
                    <?php $n++;
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; <script>
            document.write(new Date().getFullYear());
          </script> sbac.ac.th All Right Reserved</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ออกจากระบบ ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">คุณแน่ใจหรือไม่</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="../config/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <?php include('./script.php'); ?>
</body>

</html>