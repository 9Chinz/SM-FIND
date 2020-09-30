<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SM FIN D</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <div class="blockinput">
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="รหัสนักศีกษา" required />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="ชื่อ" required/>
                            </div>
                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="lastname" id="lastname" placeholder="นามสกุล" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="อีเมล" required/>
                            </div>
                            <div class="form-group">
                                <label for="tel"><i class="zmdi zmdi-account-box-phone"></i></label>
                                <input type="tel" name="tel" id="tel" placeholder="เบอร์โทร"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password" id="password" placeholder="รหัสผ่าน" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="กรอกรหัสผ่านอีกครั้ง" required />
                            </div>
                           
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi "></i></label>
                                <input type="number" name="re_pass" id="class" placeholder="ชั้น"  required/>
                                
                            </div>
                            <div class="form-group-a">
                                <label for="re-pass"><i class="zmdi "></i></label>
                                <input type="number" name="re_pass" id="class_2" placeholder="ห้อง"  required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                               <button class="continue">continue</button>
                            </div>
               
                        </form>
                        <form action="" class="register2" >
                        <div class="form-group-s">
                                <label for="section" class="labelsection"  required>ระดับชั้น:</label>
                                <select id="section" name="section">
                                    <option value="lower">ปวช.</option>
                                    <option value="upper">ปวส.</option>
                                 
                                  </select>
                                  <label for="marjor" class="labelmajor"  required >สาขา:</label>
                                  <select id="major" name="major">
                                    <option value="IT">IT</option>
                                    <option value="BC">BC</option>
                                    <option value="MK">MK</option>
                                    <option value="TR">TR</option>
                                  </select>
                                  
                            </div>
                    </form>
                        </div>
                     
                    </div>
                    <div class="signup-image">
                        <figure class="toggleimg"><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.html" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/mains.js"></script>
</body>
</html>