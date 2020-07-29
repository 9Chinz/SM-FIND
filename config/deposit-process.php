<?php
session_start();
require "./connect.php";
require "./log.php";

$accountNumber = $_SESSION['accountNumber'];
$depositCash = $_POST['deposit-cash'];
$id = $_SESSION['accountID'];
$date = date('Y-m-d');
$time = date('H:s:i');
if(isset($_POST['btn-deposit'])){
    $sql = "INSERT INTO member_trans (Amount, Date, Time, AccountID, Status) VALUES ('$depositCash', '$date', '$time', '$id', '0')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($result){
        //!log part
        $event = "รหัส " . $_SESSION['code'] . " " . $_SESSION['firstname'] . " has create transaction !";
        log_member($event, $_SESSION['id']);

        echo "<script type='text/javascript'>alert('deposit successful please wait for update!')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../about.php"> ';
    }
}

mysqli_close($conn);
?>