<?php
session_start();
require "./connect.php";
require "./log.php";

if(!isset($_SESSION['hasLogin'])){
    echo "<script>alert('please login !')</script>";
    echo '<meta http-equiv="refresh" content="1; url=../login.php"> ';
    exit();
}

if(isset($_GET['btn'])){
    $btn = $_GET['btn'];
    $id = $_GET['id'];

    if($btn == "accept"){

        if ($_SESSION['specialStatus'] == "treasurer") {
            $sql = "UPDATE member_trans SET Status = '1' WHERE TransID = '$id'";
        } elseif ($_SESSION['specialStatus'] == "sub-headroom" || $_SESSION['specialStatus'] == "headroom") {
            $sql = "UPDATE member_trans SET Status = '2' WHERE TransID = '$id'";
        } elseif ($_SESSION['userlevel'] == "teacher") {
            $sql = "UPDATE member_trans SET Status = '3' WHERE TransID = '$id'";
        } 

        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($query){
            echo "<script>alert('change status successful!')</script>";
            echo '<meta http-equiv="refresh" content="1; url=../report.php"> ';
        }else{
            echo "<script>alert('failed to change status!')</script>";
            echo '<meta http-equiv="refresh" content="1; url=../report.php"> ';
        }
        
    }else{
        $sql = "UPDATE member_trans SET Status = '0' WHERE TransID = '$id'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($query){
            echo "<script>alert('reject successful!')</script>";
            echo '<meta http-equiv="refresh" content="1; url=../report.php"> ';
        }else{
            echo "<script>alert('failed to change status!')</script>";
            echo '<meta http-equiv="refresh" content="1; url=../report.php"> ';
        }
    }
}



?>