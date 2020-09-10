<?php
session_start();
require "./connect.php";
require "./log.php";

$event = "รหัส " . $_SESSION['code'] . " " . $_SESSION['username'] . " has logout successful !";
log_member($event, $_SESSION['id']);

session_unset();
session_destroy();


mysqli_close($conn);

echo "<script type='text/javascript'>alert('logout sucessful')</script>";
echo '<meta http-equiv="refresh" content="1; url=../index.php"> ';
