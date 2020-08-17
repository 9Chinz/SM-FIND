<?php if (isset($_SESSION['hasLogin'])) {  ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">SM FIN D</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <?php echo $_SERVER['PHP_SELF'] ?>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($_SERVER['PHP_SELF'] == "/SM-FIND/index.php"){ echo "active";} ?>"><a href="index.php" class="nav-link">หน้าแรก</a></li>
          <?php if($_SESSION['userlevel'] != "teller" AND $_SESSION['userlevel'] != "bank-account"){ ?>
          <li class="nav-item <?php if($_SERVER['PHP_SELF'] == "/SM-FIND/about.php"){ echo "active";} ?>"><a href="about.php" class="nav-link">โปรไฟล์</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">บริการ</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <?php if(!isset($_SESSION['hasAccount'])){ ?>
              <a class="dropdown-item <?php if($_SERVER['PHP_SELF'] == "/SM-FIND/create-account.php"){ echo "active";} ?>" href="create-account.php">เปิดบัญชี</a>
              <?php } ?>
              <a class="dropdown-item <?php if($_SERVER['PHP_SELF'] == "/SM-FIND/deposit.php"){ echo "active";} ?>" href="deposit.php">ฝาก</a>
              <a class="dropdown-item" href="#">ถอน</a>
            </div>
          </li>
          <?php } ?>
          

          <?php 
          //? validate user
          $validate = $_SESSION['userlevel'] != "student" || $_SESSION['specialStatus'] == "treasurer"
          || $_SESSION['specialStatus'] == "sub-headroom" || $_SESSION['specialStatus'] == "headroom";
          $validate2 = $_SESSION['userlevel'] == "teller" || $_SESSION['userlevel'] == "bank-account";
          if($validate2){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ส่วนเสริม</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item <?php if($_SERVER['PHP_SELF'] == "/SM-FIND/request-account.php"){ echo "active";} ?>" href="./request-account.php">คำขอร้องการเปิดบัญชี</a>
              <!-- หน้า dashboard
              -->
              <a class="dropdown-item " href=".php">แดชบอร์ด</a>
            </div>
          </li>
          <?php }elseif($validate){ ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ส่วนเสริม</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item <?php if($_SERVER['PHP_SELF'] == "/SM-FIND/report.php"){ echo "active";} ?>" href="report.php">รายงานเงินฝาก</a>
            </div>
          </li>

            <?php } ?>
          
          <li class="nav-item"><a href="./config/logout.php" class="nav-link">LOGOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>
<?php } else { ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">SM FIN D</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">หน้าหลัก</a></li>
          <!--  <li class="nav-item"><a href="about.html" class="nav-link">เกี่ยวกับเรา</a></li>--->
          <!--<li class="nav-item dropdown visiblenav">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Portfolio</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="portfolio.html">Portfolio</a>
                  <a class="dropdown-item" href="portfolio-single.html">Portfolio Single</a>
                </div>
            </li> !-->

          <!--  <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>--->
        </ul>
      </div>
    </div>
  </nav> 
  <?php } ?>