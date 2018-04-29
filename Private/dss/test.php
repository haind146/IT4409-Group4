<?php

require_once 'ProcessData.php';

$processData = new ProcessData();

$arr = array('A21','B21','C2','D2','D4','H12');
$no_seat_a_row = 27;
print_r($arr);
echo "<br/>";
$arrAP = $processData->seat_no_process('A21',$arr,$no_seat_a_row);
print_r($arrAP);
echo "<hr/>";

?>