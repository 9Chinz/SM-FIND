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
        $event = "รหัส ".$rowMember['MemberCode']." ".$rowMember['Firstname']." has login successful !";
        log_member($event, $rowMember['MemberID']);

        //! select data save into session to use it another page
        $_SESSION['id'] = $rowMember['MemberID'];
        $_SESSION['code'] = $rowMember['MemberCode'];
        $_SESSION['username'] = $rowMember['Firstname']." ".$rowMember['Lastname'];
        $_SESSION['firstname'] = $rowMember['Firstname'];
        $_SESSION['lastname'] = $rowMember['Lastname'];
        $_SESSION['dept'] = $rowMember['Dept'];
        $_SESSION['level'] = $rowMember['Section'].".".$rowMember['Class']."/".$rowMember['Room'];
        $_SESSION['tel'] = $rowMember['Tel'];
        $_SESSION['email'] = $username;
        $_SESSION['userlevel'] = $rowMember['Userlevel'];
        $_SESSION['specialStatus'] = $rowMember['SpecialStatus'];
        $_SESSION['hasLogin'] = true;

        echo "<script type='text/javascript'>alert('login sucessful')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../about.php"> ';
    }else {
        echo "<script type='text/javascript'>alert('login fail')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../index.php"> ';
    }
    mysqli_close($conn);
}