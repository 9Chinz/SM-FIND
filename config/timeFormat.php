<?php
date_default_timezone_set("Asia/Bangkok");
$presentDate = date("d/m/Y");
$startDate = date('d/m/Y', strtotime('-15 day', strtotime(date("r"))));
$sqlpresentDate = date("Y-m-d", strtotime(date("r")));
$sqlstartDate = date("Y-m-d", strtotime('-15 day', strtotime(date("r"))));

$today = strtotime("today");
$start_week = strtotime("sunday midnight",$today);
$end_week = strtotime("next saturday",$today);
$startWeek = date("Y-m-d",$start_week); 
$endWeek = date("Y-m-d",$end_week);  