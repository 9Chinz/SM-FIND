<?php

$conn = mysqli_connect("localhost", "root", "", "smfind");

if(mysqli_connect_errno()){
    echo "connect failed ". mysqli_connect_error();
}