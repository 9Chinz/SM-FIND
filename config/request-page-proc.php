<?php
session_start();
require "./connect.php";
require "./log.php";

$code = $_POST['code'];
$name = $_POST['name'];
$email = $_POST['email'];
$accountNumber = $_POST['accountNumber'];
$bankBook = $_POST['bankBook'];
$cash = $_POST['cash'];

if(isset($_POST['btn-accept'])){

    
    $sql = "SELECT * FROM request_account WHERE Code = '$code'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['MemberID'];
    if($row){
        $insertSql = "INSERT INTO member_account (Account_number, Bankbook, Account_balance, MemberID) VALUES ('$accountNumber', '$bankBook', '$cash', '$id'); ";
        $result = mysqli_query($conn, $insertSql) or die(mysqli_error($conn));
        if($result){
            //!log part
            $event = "Email " . $_SESSION['email'] . " " . $_SESSION['username'] . " has created account for "." $email "." successful !";
            log_member($event, $_SESSION['id']);

            $deleteSql = "DELETE FROM request_account WHERE Code ='$code';";
            $delResult = mysqli_query($conn ,$deleteSql);
            echo "<script type='text/javascript'>alert('create account successful!')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../request-account.php"> ';
        }else{
            echo "failed";
        }
    }
}elseif(isset($_POST['btn-reject'])){
    $deleteSql = "DELETE FROM request_account WHERE Code ='$code';";
    $delResult = mysqli_query($conn ,$deleteSql);
    if($delResult){
        //!log part
        $event = "Email " . $_SESSION['email'] . " " . $_SESSION['username'] . " has reject account for "." $email "." successful !";
        log_member($event, $_SESSION['id']);

        echo "<script type='text/javascript'>alert('reject create account successful!')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../request-account.php"> ';
    }
}
mysqli_close($conn);
