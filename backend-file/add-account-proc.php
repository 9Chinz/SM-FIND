<?php

session_start();

$ac_number = $_POST['account-number'];
$bankBook = $_POST['bank-book'];
$cash = $_POST['cash'];
$memberID = $_SESSION['id'];

if (isset($_POST['add-result'])) {
    require "../config/connect.php";
    $sql = "INSERT INTO member_account (Account_number, Bankbook, Account_balance, MemberID) VALUES ('$ac_number', '$bankBook', '$cash', '$memberID')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result) {
        echo "<script type='text/javascript'>alert('add account success')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../login.php"> ';
    }
}
