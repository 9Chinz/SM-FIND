<?php 
session_start();
if(!isset($_SESSION['hasLogin'])){
    echo "<script type='text/javascript'>alert('please login')</script>";
    echo '<meta http-equiv="refresh" content="1; url=../index.php"> ';
    exit();
}
$cash = $_POST['cash'];

echo "<script type='text/javascript'>alert('create account sucessful')</script>";
    echo '<meta http-equiv="refresh" content="1; url=../index.php"> ';
    ?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-account</title>
</head>
<body>

    <form method="POST" action="add-account-proc.php">
        <input type="text" name="account-number" id="" placeholder="ac-number" required>
        <input type="text" name="bank-book" id="" placeholder="bank-book" required>
        <input type="double" name="cash" id="" placeholder="30 ขึ้น" required>
        <input type="submit" name="add-result" value="submit">
    </form>
</body>
</html>
