<?php
include_once 'DSS_Main.php';
include_once 'User_Required.php';

$UserRequired = new User_Required();

$UserRequired->setRequired(50000,90000,'2018-04-14','2018-04-16','17:00:00','20:30:00','romance,drama',4.1,40,array('VTC','BK Studio','Marvel'));
$ArrayRequired = $UserRequired->getUserRequired();

$main = new DSS_Main();
$Weight_Score = array('price' => 9,'time' => 8, 'genre' => 7 , 'rating' => 9, 'seat_no' => 6, 'producer'=>10);
print_r($main->Decision_Making($ArrayRequired,$Weight_Score));

?>