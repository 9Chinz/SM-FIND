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
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <?php require "./navbar.php" ?>
    <!-- END nav -->
    
     <section class="home-slider ftco-degree-bg">
      <div class="slider-item bread-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-10 col-sm-12 ftco-animate mb-4 text-center">
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Profile</span></p>
              <h1 class="mb-3 bread">welcome</h1>
              <h1 class="mb-3 fixfont"><?php echo $_SESSION['username']; ?></h1>
              <?php if(isset($_SESSION['hasAccount'])){ ?>
                <h1 class="mb-3 bread"><?php echo $_SESSION['accountNumber']; ?></h1>
                <h1 class="mb-3 bread"><?php echo $_SESSION['balance']; ?> ฿</h1>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="row profile">
        <img src="images/person_1.jpg" alt="" class="imgprofile" >
        <div class="profileblock">
          <p>รหัสนักศึกษา: <?php echo $_SESSION['code']; ?></p>
          <p>ชื่อ-นามสกุล: <?php echo $_SESSION['username']; ?></p>
          <p>ชั้น: <?php echo $_SESSION['level']; ?></p>
          <p>สาขา: <?php echo $_SESSION['dept']; ?></p>
          <p>email: <?php echo $_SESSION['email']; ?></p>
      </div>

    </section>
    <section class="ftco-section ftco-counter ftco-degree-bg" id="section-counter">
      <div class="">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Leaderboard & Quest</h2>
          </div>
        </div>
        <div class="row ">
          <div class="col-xl-6 Leaderboard">
            <div class="headleader">
            <h1>Leaderboard</h1>
          </div>
            <div class="leaderboardbox">
                <div class="leaderboard__profiles"> 
                  <img src="images/person_1.jpg" alt="" class="leaderboard__picture">
                  <span>tintalab</span> 
                </div>
                <div class="leaderboard__profiles"> 
                  <img src="images/person_1.jpg" alt="" class="leaderboard__picture">
                  <span>tintalab</span> 
                </div>
                <div class="leaderboard__profiles"> 
                  <img src="images/person_1.jpg" alt="" class="leaderboard__picture">
                  <span>tintalab</span> 
                </div>
                <div class="leaderboard__profiles"> 
                  <img src="images/person_1.jpg" alt="" class="leaderboard__picture">
                  <span>tintalab</span> 
                </div>
          </div>
        </div>
          <div class="col-xl-6 quest">
            <div class="headleader">
              <h1>Quest</h1>
            </div>
              <div class="questbox">
                  <div class="quest__profiles">
                    <span>1. ฝากให้ถึง 200 ในอาทิตย์นี้</span> 
                    <span></span>
                   <span>500</span>
                  </div>
                  <div class="quest__profiles">                   
                    <span>1. ฝากให้ถึง 200 ในอาทิตย์นี้</span> 
                    <span></span>
                    <span>400</span>
                  </div>
                  <div class="quest__profiles">              
                    <span>1. ฝากให้ถึง 200 ในอาทิตย์นี้</span>
                    <span></span> 
                    <span>200</span>
                  </div>
                  <div class="quest__profiles">   
                    <span>1. ฝากให้ถึง 200 ในอาทิตย์นี้</span> 
                    <span></span>
                    <span>1000</span>
                  </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section testimony-section ftco-degree-bg">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            
            <h2>achievements</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/farm.svg)">
                    
                  </div>
                  <div class="text">
                    
                    <p class="name">เจ้าแห่งการปลูก</p>
                    <span class="position">ปลูกต้นไม้ครบ 10 ครั้ง</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/farm.svg)">
                    
                  </div>
                  <div class="text">
                  <p class="name">เจ้าแห่งการปลูก</p>
                    <span class="position">ปลูกต้นไม้ครบ 10 ครั้ง</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/farm.svg)">
               
                  </div>
                  <div class="text">
                    
                  <p class="name">เจ้าแห่งการปลูก</p>
                    <span class="position">ปลูกต้นไม้ครบ 10 ครั้ง</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/farm.svg)">
                
                  </div>
                  <div class="text">
                    
                  <p class="name">เจ้าแห่งการปลูก</p>
                    <span class="position">ปลูกต้นไม้ครบ 10 ครั้ง</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/farm.svg)">

                  </div>
                  <div class="text">
                   
                  <p class="name">เจ้าแห่งการปลูก</p>
                    <span class="position">ปลูกต้นไม้ครบ 10 ครั้ง</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

   
    <?php require "footer.php" ?>
  

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