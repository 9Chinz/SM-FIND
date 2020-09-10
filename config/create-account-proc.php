<?php
session_start();
if(isset($_POST['btn-create'])){
    require "./connect.php";
    require "./log.php";

    $code = $_POST['code'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $cash = $_POST['cash'];
    $id = $_SESSION['id'];
    
    $sql = "INSERT INTO request_account (Code, Firstname, Lastname, Email, Begin_cash, MemberID) VALUES ('$code', '$firstname', '$lastname', '$email', '$cash', '$id')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($result){
        //!log part
        $event = "รหัส " . $_SESSION['code'] . " " . $_SESSION['firstname'] . " has required for created account ! ";
        log_member($event, $id);

        echo "<script type='text/javascript'>alert('required for created account successful !')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../index.php"> ';
    }else{
        echo "<script type='text/javascript'>alert('required for created account failed !')</script>";
        echo '<meta http-equiv="refresh" content="1; url=../create-account.php"> ';
    }
}

?>