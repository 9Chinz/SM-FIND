<?php
session_start();
require "../config/connect.php";

include "./search.php";
$date = date("Y-m-d");

if (isset($_GET['btn'])) {
  $btn = $_GET['btn'];
  $id = $_GET['id'];
  if ($btn == "accept") {
    if ($_SESSION['userlevel'] == "teller") {
      $sql = "UPDATE member_trans SET Status = '4' WHERE TransID = '$id'";
    } elseif ($_SESSION['userlevel'] == "bank-account") {
      $sql = "UPDATE member_trans SET Status = '5' WHERE TransID = '$id'";
    }
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($query) {
      if($_SESSION['userlevel'] == "bank-account"){
        $sql = "SELECT * FROM member_trans WHERE TransID = '$id'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $result = mysqli_fetch_array($query);
        $accountID= $result['AccountID'];
        $amount = $result['Amount'];
        $plusSql = "UPDATE member_account SET Account_balance = Account_balance+'$amount' WHERE AccountID = '$accountID';";
        $sum = mysqli_query($conn, $plusSql) or die(mysqli_error($conn));
      }
      echo '<meta http-equiv="refresh" content="0; url=./deposit-management.php"> ';
    } else {
      echo "<script>alert('failed to change status!')</script>";
      echo '<meta http-equiv="refresh" content="1; url=./deposit-management.php"> ';
    }
  } else {
    $sql = "UPDATE member_trans SET Status = '0' WHERE TransID = '$id'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($query) {
      echo '<meta http-equiv="refresh" content="0; url=./deposit-management.php"> ';
    } else {
      echo "<script>alert('failed to change status!')</script>";
      echo '<meta http-equiv="refresh" content="1; url=./deposit-management.php"> ';
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Deposit management</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "./management-nav.php"; ?>
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
            <h1 class="h3 mb-0 text-gray-800">จัดการฝากเงิน</h1>
          </div>


          <div class="col-lg-12">

            <div class="card shadow  position-relative">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ค้นหาห้องเรียน</h6>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="card-body">
                  <?php include "./search_bar.php"; ?>
                  <input type="submit" class="btn btn-primary" value="ค้นหา" name="btnSearch">
                </div>
              </form>


            </div>
          </div>
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
                      <th scope="col" colspan="2">ตรวจสอบ</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($_POST['btnSearch'])) {
                      $n = 1;
                      if ($num > 0) {
                        while ($row = mysqli_fetch_array($query)) { ?>
                          <form action="" method="post">
                            <tr>
                              <th scope="row"><?php echo $n; ?></th>
                              <td><?php echo $row['MemberCode']; ?></td>
                              <td><?php echo $row['Firstname'] . " " . $row['Lastname']; ?></td>
                              <td><?php echo $row['Account_number']; ?></td>
                                <td><?php echo $row['Amount']; ?><span>฿</span></td>
                                <td>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $row['TransID']; ?>&btn=accept" class="btn btn-success">ยอมรับ</a>
                              <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $row['TransID']; ?>& btn=reject" class="btn btn-danger">ปฎิเสธ</a>
                              </td>
                            </tr>
                          </form>
                        <?php $n++;
                        }
                      } else { ?>

                    <?php }
                    } ?>
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
          <a class="btn btn-primary" href="../config/logout.php">Logout</a>
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

</body>

</html>