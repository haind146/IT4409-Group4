<?php
header("Content-type: text/html; charset=utf-8");
function isValidDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if(isValidDate("2:15:00", 'H:i:s')){
    echo "true";
} else {
    echo "false cmmr";
}
?>

