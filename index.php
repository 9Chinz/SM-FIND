<?php
 session_start();
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
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <?php if(isset($_SESSION['hasLogin'])) { 
      require "./navbar.php";
    }else { ?>
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
    </nav> <?php } ?>
    <!-- END nav -->
    
    <section class="home-slider ftco-degree-bg">
      <div class="slider-item">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 ftco-animate text-center">
              <h1 class="mb-4"> 
                <strong class="typewrite" data-period="4000" data-type='[ "ฝากเงิน", "ออมเงิน", "ต้อง", "SM FIN D" ]'>
                  <span class="wrap"></span>
                </strong>
              </h1>
              <p>SM FIN D เป็น web-application ที่จะทำให้คุณสะดวกสะบายไปกับการฝากเงินของคุณ พร้อมทั้งระบบ gamification ที่จะทำให้คุณสนุกไปกับการฝากเงิน</p>
              <?php if(!isset($_SESSION['hasLogin'])){ ?>
              <p><a href="login.php" class="btn btn-primary btn-outline-white px-4 py-3"> LOGIN </a> <a href="register.php" class="btn btn-primary btn-outline-white px-4 py-3 registerleft"> REGISTER </a></p>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END slider -->

   
    

    <section class="ftco-section">
      <div class="container-fluid">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2>SM FIN D</h2>
            <span class="subheading">มิติไหม่แห่งการฝากเงิน</span>  
          </div>
        </div>
        <div class="row no-gutters dun">
          <div class="block-3 d-md-flex ftco-animate">
            <a href="" class="image" style="background-image: url('images/technology2.svg'); "></a>
            <div class="text">
              <h4 class="subheading">Gamification</h4>
              <h2 class="heading"><a href="">game-design elements </a></h2>
              <p>Gamification เป็น Apps หรือบริการที่นำเอาคอนเซ็ปของเกมมาประยุกต์ใช้ มีการวางกลไกของเกมภายใน App อาทิเช่น การกำหนดกิจกรรมให้ทำ มีการนำเสนอแต้ม, leader boards, levels, badge ต่างๆ มาประยุกต์เป็นส่วนหนึ่งของเนื้อหาเพื่อการกระตุ้นและดึงความสนใจให้คนมาเข้าร่วม พอพูดคร่าวๆ แบบนี้แล้วทุกคนก็เริ่มจะร้อง อ๋อ เพราะว่าหลายคนก็คงเคยใช้ App ประเภท Gamification มาแล้วกันทั้งนั้น อย่างเช่น Location-Based Game ที่ชื่อว่า Foursquare ที่แบรนด์ต่างๆ สามารถให้รางวัลเมื่อเข้ามาทำการ Checkin ตามกฎเกณฑ์ที่กำหนด</p>
            </div>
          </div>
          <div class="block-3 d-md-flex ftco-animate">
            <a href="" class="image order-2" style="background-image: url('images/business.svg'); "></a>
            <div class="text order-1">
              <h4 class="subheading">E-Banking</h4>
              <h2 class="heading"><a href="">a method of banking in which the customer conducts transactions electronically via the Internet</a></h2>
              <p>E-Banking คือ การทำธุรกรรมต่างๆ กับธนาคาร โดยผ่านเครือข่ายอินเตอร์เน็ต เช่น การฝากเงิน ถอนเงิน โอนเงิน หรือ สอบถามยอดเงิน เป็นต้น E-Banking อาจเรียกด้วยชื่ออื่น เช่น Internet Banking (ธนาคารอินเตอร์เน็ต), Online Banking (ธนาคารออนไลน์), Electronic Banking (ธนาคารอิเล็กทรอนิกส์), Cyber Banking (ธนาคารไซเบอร์) เป็นต้น</p>
            </div>
          </div>
          <div class="block-3 d-md-flex ftco-animate">
            <a href="" class="image" style="background-image: url('images/data.svg'); "></a>
            <div class="text">
              <h4 class="subheading">Web Design</h4>
              <h2 class="heading"><a href="">Even the all-powerful Pointing has no control</a></h2>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

   
    <section class="ftco-section ftco-counter ftco-degree-bg" id="section-counter">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Our achievements</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="1000">0</strong>
                <span>จำนวนผู้ฝากในวันนี้</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="12000">0</strong>
                <span>ยอดผู้เข้าชม</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="100">0</strong>
                <span>จำนวนคนที่เก็บ achievement ครบ</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   
    <?php include "./footer.php"  ?>
    
  

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