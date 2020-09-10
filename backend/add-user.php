<?php
require "../config/connect.php";
if (isset($_POST['btnAddUser'])) {
    $code = $_POST['memberCode'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dept = $_POST['dept'];
    $section = $_POST['section'];
    $class = $_POST['class'];
    $room = $_POST['room'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userlevel = $_POST['userLevel'];
    $specialstatus = $_POST['specialStatus'];
    $ecrypt_pass = md5(md5(md5($password)));

    $sql = "INSERT INTO member (MemberCode, Firstname, Lastname, Dept, Section, Class, Room, Tel, Email, Password, Userlevel, SpecialStatus) VALUES ('$code', '$firstname', '$lastname', '$dept', '$section', '$class', '$room', '$tel', '$email', '$ecrypt_pass', '$userlevel', '$specialstatus')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result) {
        echo "<script type='text/javascript'>alert('login sucessful')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add user</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="number" name="memberCode" placeholder="รหัสนศ" required>
        <input type="text" name="firstname" placeholder="ชื่อจริง" required>
        <input type="text" name="lastname" placeholder="นามสกุล" required>
        <select name="dept">
            <option value="IT">ไอที</option>
            <option value="CG">ซีจี</option>
            <option value="AC">บัญชี</option>
            <option value="BC">คอมธุร</option>
            <option value="none">ไม่มี</option>
        </select>
        <select name="section">
            <option value="lower">ปวช</option>
            <option value="upper">ปวส</option>
            <option value="none">ไม่มี</option>
        </select>
        <input type="number" name="class" placeholder="ชั้น" required>
        <input type="number" name="room" placeholder="ห้อง" required>
        <input type="text" name="tel" placeholder="เบอร์" required>
        <input type="email" name="email" placeholder="email sbac" required>
        <input type="password" name="password" placeholder="รหัสนศ" required>
        <select name="userLevel">
            <option value="student">นักเรียน</option>
            <option value="teacher">อาจารย์</option>
            <option value="teller">พนักงานฝาก-ถอน</option>
            <option value="bank-account">พนักงานบัญชี</option>
        </select>
        <select name="specialStatus">
            <option value="">ไม่มี</option>
            <option value="treasurer">เหรัญญิก</option>
            <option value="sub-headroom">รองหัวหน้าห้อง</option>
            <option value="headroom">หัวหน้าห้อง</option>
        </select>
        <input type="submit" name="btnAddUser" value="submit">
    </form>
</body>

</html>