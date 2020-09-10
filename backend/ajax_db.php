<?php
include "../config/connect.php";

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