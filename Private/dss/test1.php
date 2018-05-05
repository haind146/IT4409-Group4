<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
include_once 'DSS_Main.php';
include_once 'User_Required.php';
include_once 'ProcessData.php';

$UserRequired = new User_Required();
$dp = new ProcessData();

$UserRequired->setRequired(30000,50000,'2018-05-01','2018-05-02','01:00:00','20:30:00',' ',4.1,'E7',array('VTC','BK Studio','Marvel'));
$ArrayRequired = $UserRequired->getUserRequired();


$main = new DSS_Main();
$Weight_Score = array('price' => 1,'time' => 8, 'genre' => 7 , 'rating' => 9, 'seat_no' => 10, 'producer'=>5);
$resultset = $main->Decision_Making($ArrayRequired,$Weight_Score);
print_r($resultset);

?>
