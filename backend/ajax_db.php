<?php
include "../config/connect.php";
include "../config/timeFormat.php";

if(isset($_POST['function']) AND $_POST['function'] == 'degree'){
    $id_degree = $_POST['id'];
    if($id_degree == "Upper"){
        echo '<option value="" selected disabled>-เลือกชั้น-</option>';
        echo '<option value="1">1</option>';
        echo '<option value="2">2</option>';
    }else{
        echo '<option value="" selected disabled>-เลือกชั้น-</option>';
        echo '<option value="1">1</option>';
        echo '<option value="2">2</option>';
        echo '<option value="3">3</option>';
    }
}

if(isset($_POST['function']) AND $_POST['function'] == 'class'){
    $id_degree = $_POST['id_degree'];
    $id_class = $_POST['id_class'];

    $sql = "SELECT degree.degree, class.class, room.room FROM degree
    INNER JOIN class ON degree.degree_id = class.degree_id
    INNER JOIN room ON class.class_id = room.class_id
    WHERE degree.degree = '$id_degree' AND class.class = '$id_class';";
    echo '<option value="" selected disabled>-เลือกห้อง-</option>';
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while($row = mysqli_fetch_array($query)){
        echo '<option value="'.$row['room'].'">'.$row['room'].'</option>';
    }
}

if (isset($_POST['function']) and $_POST['function'] == 'stdSearch') {
    if(empty($_POST['id_dept']) OR empty($_POST['id_degree']) OR empty($_POST['id_class']) OR empty($_POST['id_room']) OR empty($_POST['id_date'])){
        echo "<script>alert('please select data!')</script>";
        exit();
    }
    $id_dept = $_POST['id_dept'];
    $id_degree = $_POST['id_degree'];
    $id_class = $_POST['id_class'];
    $id_room = $_POST['id_room'];
    $selectDate = $_POST['id_date'];
    if($selectDate == $presentDate){
        $sqlSelectDate = date("Y-m-d", strtotime('today'));
    }else{
        $sqlSelectDate = date("Y-d-m", strtotime($selectDate));
    }
    
    $sql = "SELECT * FROM `member` WHERE `Userlevel` = 'student' AND Dept = '$id_dept' AND Section = '$id_degree' AND Class = '$id_class' AND Room = '$id_room'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    //count student
    $i = 0;
    $depoCount = 0;
    //sum amount
    $sumAmount = 0;
    while ($row = mysqli_fetch_array($query)) {
        $memId = $row['MemberID'];
        $Accsql = "SELECT * FROM `member` 
        INNER JOIN member_account on member.MemberID = member_account.MemberID
        WHERE member.MemberID = '$memId';";
        $AccQuery = mysqli_query($conn, $Accsql) or die(mysqli_error($conn));
        $AccRow = mysqli_fetch_array($AccQuery);

        $TransSql = "SELECT * FROM `member` 
        INNER JOIN member_account on member.MemberID = member_account.MemberID
        INNER JOIN member_trans on member_account.AccountID = member_trans.AccountID
        WHERE member.MemberID = '$memId' AND member_trans.Date = '$sqlSelectDate';";
        $TransQuery = mysqli_query($conn, $TransSql) or die(mysqli_error($conn));
        $TransRow = mysqli_fetch_array($TransQuery);
        
        if(!empty($AccRow) AND !empty($TransRow)){
            if($TransRow['Status'] == "5"){
                $transStatus = "ฝากแล้ว";
            }else{
                $transStatus = "รอการยืนยัน";
            }
            echo '<tr>
                <th scope="row">'.$row['MemberCode'].'</th>
                <td>'.$row['Firstname']." ".$row['Lastname'].'</td>
                <td>'.$AccRow['Account_number'].'</td>
                <td>'.$TransRow['Amount'].'</td>
                <td>'.$transStatus.'</td>
            </tr>';
            if($transStatus == "ฝากแล้ว"){
                // sumation of amount transaction
                $sumAmount += $TransRow['Amount'];
                //count transaction successful
                $depoCount++;
            }
        }else if(empty($TransRow) AND !empty($AccRow)){
            echo '<tr>
                <th scope="row">'.$row['MemberCode'].'</th>
                <td>'.$row['Firstname']." ".$row['Lastname'].'</td>
                <td>'.$AccRow['Account_number'].'</td>
                <td>-</td>
                <td>ยังไม่ฝาก</td>
            </tr>';
        }else{
            echo '<tr>
                <th scope="row">'.$row['MemberCode'].'</th>
                <td>'.$row['Firstname']." ".$row['Lastname'].'</td>
                <td>ไม่มีบัญชี</td>
                <td>-</td>
                <td>-</td>
            </tr>';
        }
        
        $i++;
    }
    
    if(isset($sumAmount)){
        if($sumAmount != 0){
            echo '<tr>
                    <td colspan="3">ยอดรวม</td>        
                    <td>'.$sumAmount.'</td> 
                    <td></td> 
                </tr>';
        }else if($sumAmount == 0 AND $i != 0){
            echo '<tr>
                    <td colspan="3">ยอดรวม</td>        
                    <td>0</td> 
                    <td></td> 
                </tr>';
        }else{

        }
    }
}
