<?php
$date = date("Y-m-d");
if (isset($_POST['btnSearch']) AND !empty($_POST['dept']) AND !empty($_POST['section']) AND !empty($_POST['class']) AND !empty($_POST['room'])) {
    $dept = $_POST['dept'];
    $section = $_POST['section'];
    $class = $_POST['class'];
    $room = $_POST['room'];
    if ($_SESSION['userlevel'] == "teller") {
        $status = 3;
    } else if ($_SESSION['userlevel'] == "bank-account") {
        $status = 4;
    }

    $sql = "SELECT member_trans.TransID, member.MemberCode, member.Firstname, member.Lastname, member_account.Account_number, member_trans.Date, member_trans.Amount, member_trans.Status
    FROM member
    INNER JOIN member_account ON  member.MemberID = member_account.MemberID
    INNER JOIN member_trans ON member_account.AccountID = member_trans.AccountID
    WHERE member.Dept = '$dept' AND member.Section = '$section' AND member.Class = '$class' AND member.Room = '$room' AND Date = '$date' AND member_trans.Status = '$status'";

    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $num = mysqli_num_rows($query);
}else{
    $num = 0;
}
