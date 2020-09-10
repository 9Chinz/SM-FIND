<?php

function get_ip(){
    $ip_address=$_SERVER['REMOTE_ADDR'];  
    return $ip_address;
}

function log_file($event){
    include "connect.php";
    date_default_timezone_set('Asia/Bangkok');
    $event = $event;
    $date = date('Y-m-d');
    $time = date('H:s:i');
    $log_ip =  get_ip();
    $logsql = "INSERT INTO log_system (IP, Event, Date, Time) VALUES ('$log_ip', '$event', '$date' ,'$time');";
    $logquery = mysqli_query($conn, $logsql);
    mysqli_close($conn);
}

function log_member($event, $memberID){
    include "connect.php";
    date_default_timezone_set('Asia/Bangkok');
    $event = $event;
    $memberID = $memberID;
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $log_ip =  get_ip();
    $logsql = "INSERT INTO member_log (IP, Event, Date, Time, MemberID) VALUES ('$log_ip', '$event', '$date' ,'$time', '$memberID');";
    $logquery = mysqli_query($conn, $logsql);
    mysqli_close($conn);
}

?>