<?php if (isset($_SESSION['hasLogin'])) {  ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">SM FIN D</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="about.php" class="nav-link">My profile</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">service</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="create-account.php">Create account</a>
              <a class="dropdown-item" href="deposit.php">Deposit</a>
              <a class="dropdown-item" href="#">Withdraw</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">extension</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="report.php">รายงานเงินฝาก</a>
            </div>
          </li>

          <li class="nav-item"><a href="./config/logout.php" class="nav-link">LOGOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>
<?php } else { ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">SM FIN D</a>
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