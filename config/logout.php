<?php
session_start();
require "./connect.php";

session_unset();
session_destroy();

echo "<script type='text/javascript'>alert('logout sucessful')</script>";
echo '<meta http-equiv="refresh" content="1; url=../index.php"> ';