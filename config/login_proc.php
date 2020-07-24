<?php
session_start();

if(isset($_POST['signin'])){
    //? include file
    require 'connect.php';
    require "log.php";

    //? get data from form
    $username = $_POST['email'];
    $password = $_POST['password'];

    //! prevent form sql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $encryptPassword = md5(md5(md5($password)));
    $encryptPassword = mysqli_real_escape_string($conn, $encryptPassword);

    $sql = "SELECT * FROM member WHERE Email = '$username' AND Password = '$encryptPassword';";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    if($row){
        $event = "รหัส ".$row['MemberCode']." ".$row['Firstname']." has login successful !";
        log_member($event, $row['MemberID']);

        //! select data save into session to use it another page
        $_SESSION['id'] = $row['MemberID'];
        $_SESSION['code'] = $row['MemberCode'];
        $_SESSION['username'] = $row['Firstname']." ".$row['Lastname'];
        $_SESSION['firstname'] = $row['Firstname'];
        $_SESSION['lastname'] = $row['Lastname'];
        $_SESSION['dept'] = $row['Dept'];
        $_SESSION['level'] = $row['Section'].".".$row['Class']."/".$row['Room'];
        $_SESSION['tel'] = $row['Tel'];
        $_SESSION['email'] = $username;
        $_SESSION['userlevel'] = $row['Userlevel'];
        $_SESSION['specialStatus'] = $row['SpecialStatus'];
        $_SESSION['hasLogin'] = true;

        echo "<script type='text/javascript'>alert('login sucessful')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../about.php"> ';
    }else {
        echo "<script type='text/javascript'>alert('login fail')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../index.php"> ';
    }
    mysqli_close($conn);
}