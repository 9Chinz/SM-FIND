<?php
session_start();
require('../fpdf182/fpdf.php');
include "../config/connect.php";
include "../config/timeFormat.php";

class PDF extends FPDF
{
    
    function inputClass($dept, $section, $class, $room){
        $this->dept = $dept;
        $this->dept = $this->getDept($this->dept);
        $this->section = $section;
        $this->section = $this->getSection($this->section);
        $this->class = $class;
        $this->room = $room;
    }

    function inputDate($date){
        $this->date = $date;
        $date = explode("/", $this->date);
        $this->date = $date[0];
        $this->month = $date[1];
        $this->month = $this->Month($this->month);
        $this->year = ((int)$date[2]+543);
    }

    function Header()
    {
        // Add fonts
        $this->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $this->AddFont('THSarabunNew', 'B', 'THSarabunNew_b.php');
        $this->SetLeftMargin(10);
        // Select thsarabunnew 16
        $this->SetFont('THSarabunNew', '', 14);
        $this->Cell(0, 6, iconv('UTF-8', 'cp874', 'รายงานยอดเงินฝาก'), 0, 1);
        $this->Cell(0, 6, iconv('UTF-8', 'cp874', $this->date.' '.$this->month.' '.$this->year), 0, 1);
        $this->Cell(0, 6, iconv('UTF-8', 'cp874', 'ระดับชั้น '.$this->section.$this->class.'/'.$this->room.' สาขา'.$this->dept), 0, 1);
        $this->line(5, 30, 200, 30);
        $this->SetLeftMargin(5);
    }
    function Footer()
    {
        $this->SetLineWidth(0, 5);
        // Add fonts
        $this->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $this->AddFont('THSarabunNew', 'B', 'THSarabunNew_b.php');
        $this->AddFont('THSarabunNew', 'I', 'THSarabunNew_i.php');
        // Select thsarabunnew 16
        $this->SetFont('THSarabunNew', 'B', 8);
        // Go to 1.2 cm from bottom
        $this->SetY(-12);
        // Print centered page number
        $this->Cell(0, 5, iconv('UTF-8', 'cp874', 'SM FIN D'), 0, 0, "L");
        $this->Cell(0, 5, iconv('UTF-8', 'cp874', 'วันที่พิมพ์: ' . date('d/m/') . (date('Y') + 543) . ' ' . date('H:i:s')), 0, 0, "R");
    }

    function Month($month)
    {   
        $TH_Month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        return $TH_Month[(int)$month];
    }

    function getDept($dept){
        $TH_Dept = array("IT" => "เทคโนโลยีสารสนเทศ", "CG" => "คอมพิวเตอร์กราฟิก", "BC" => "คอมพิวเตอร์ธุรกิจ", "AC" => "การบัญชี", "EP" => "English Program", "FL" => "ภาษาต่างประเทศ", "MK" => "การตลาด", "TR" => "การท่องเที่ยว", "HM" => "การโรงแรม", "IC" => "เชฟอาหารนานาชาติ");
        return $TH_Dept[$dept];
    }

    function getSection($section){
        $TH_Section = array("Upper" => "ปวส.", "Lower" => "ปวช.");
        return $TH_Section[$section];
    }
}

if (isset($_POST['stdPrint'])) {
    if (empty($_POST['dept']) or empty($_POST['section']) or empty($_POST['class']) or empty($_POST['room']) or empty($_POST['date'])) {
        $dept = "";
        $section = "";
        $class = "";
        $room = "";
        $selectDate = date("Y-m-d", strtotime('today'));
        $sqlSelectDate = date("Y-m-d", strtotime('today'));
    } else {
        $dept = $_POST['dept'];
        $section = $_POST['section'];
        $class = $_POST['class'];
        $room = $_POST['room'];
        $selectDate = $_POST['date'];
        if ($selectDate == $presentDate) {
            $sqlSelectDate = date("Y-m-d", strtotime('today'));
        } else {
            $sqlSelectDate = date("Y-d-m", strtotime($selectDate));
        }
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->inputDate($selectDate);
    $pdf->inputClass($dept, $section, $class, $room);
    $pdf->AddPage();
    $pdf->Ln(5);
    $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
    $pdf->SetFont('THSarabunNew', '', 16);
    $pdf->Cell(195, 4, iconv('UTF-8', 'cp874', 'สรุปยอดการฝากประจำวัน'), 0, 1, "C");
    $pdf->Ln(4);
    $pdf->Cell(12, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C');
    $pdf->Cell(23, 10, iconv('UTF-8', 'cp874', 'รหัสนักศึกษา'), 1, 0, "C");
    $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ชื่อ-นามสกุล'), 1, 0, "C");
    $pdf->Cell(103, 10, iconv('UTF-8', 'cp874', 'จำนวนเงินที่ฝาก'), 1, 0, "C");
    $pdf->Ln();

    $sql = "SELECT * FROM `member` WHERE `Userlevel` = 'student' AND Dept = '$dept' AND Section = '$section' AND Class = '$class' AND Room = '$room'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    //count student
    $i = 1;
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

        if (!empty($AccRow) and !empty($TransRow)) {
            if ($TransRow['Status'] == "5") {
                $transStatus = "ฝากแล้ว";
            } else {
                $transStatus = "รอการยืนยัน";
            }
            $pdf->Cell(12, 10, iconv('UTF-8', 'cp874', $i), 1, 0, 'C');
            $pdf->Cell(23, 10, iconv('UTF-8', 'cp874', $row['MemberCode']), 1, 0, "C");
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $row['Firstname'] . " " . $row['Lastname']), 1, 0, "C");
            $pdf->Cell(103, 10, iconv('UTF-8', 'cp874', $TransRow['Amount']), 1, 0, "C");
            $pdf->Ln();
            if ($transStatus == "ฝากแล้ว") {
                // sumation of amount transaction
                $sumAmount += $TransRow['Amount'];
                //count transaction successful
                $depoCount++;
            }
        } else if (empty($TransRow) and !empty($AccRow)) {
            $pdf->Cell(12, 10, iconv('UTF-8', 'cp874', $i), 1, 0, 'C');
            $pdf->Cell(23, 10, iconv('UTF-8', 'cp874', $row['MemberCode']), 1, 0, "C");
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $row['Firstname'] . " " . $row['Lastname']), 1, 0, "C");
            $pdf->Cell(103, 10, iconv('UTF-8', 'cp874', '-'), 1, 0, "C");
            $pdf->Ln();
        } else {
            $pdf->Cell(12, 10, iconv('UTF-8', 'cp874', $i), 1, 0, 'C');
            $pdf->Cell(23, 10, iconv('UTF-8', 'cp874', $row['MemberCode']), 1, 0, "C");
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $row['Firstname'] . " " . $row['Lastname']), 1, 0, "C");
            $pdf->Cell(103, 10, iconv('UTF-8', 'cp874', '-'), 1, 0, "C");
            $pdf->Ln();
        }

        $i++;
    }

    if (isset($sumAmount)) {
        if ($sumAmount != 0) {
            $pdf->Cell(95, 10, iconv('UTF-8', 'cp874', 'ยอดรวม'), 1, 0, 'C');
            $pdf->Cell(103, 10, iconv('UTF-8', 'cp874', $sumAmount), 1, 0, "C");
            $pdf->Ln();
        } else if ($sumAmount == 0 and $i != 0) {
            $pdf->Cell(95, 10, iconv('UTF-8', 'cp874', 'ยอดรวม'), 1, 0, 'C');
            $pdf->Cell(103, 10, iconv('UTF-8', 'cp874', '-'), 1, 0, "C");
            $pdf->Ln();
        } else {
        }
    }




    $pdf->Output();
}
