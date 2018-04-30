<?php
/**
 * Created by PhpStorm.
 * User: Nguyễn Bá Khải
 * Date: 4/30/2018
 * Time: 9:37 PM
 */
include_once '../dss/DSS_Main.php';
include_once '../dss/User_Required.php';
if(!empty($_POST)){
    error_reporting(0);
    print_r($_POST);
    echo "<br/>";
    header("Content-type: text/html; charset=utf-8");
    $start_date = date('Y-m-d', strtotime($_POST['date1']));
    $end_date = date('Y-m-d', strtotime($_POST['date2']));
    $st_time = $_POST['time1'].":00";
    $ed_time = $_POST['time2'].":00";

    $start_time = date('H:i:s',strtotime($st_time));
    $end_time = date('H:i:s', strtotime($ed_time));
    $UserRequired = new User_Required();
    $genre = implode($_POST['genre'],",");
    $UserRequired->setRequired($_POST['minprice'],$_POST['maxprice'],$start_date,$end_date,$start_time,$end_time,$genre,$_POST['rating'],$_POST['seatno'],$_POST['producer']);
    $ArrayRequired = $UserRequired->getUserRequired();
    echo "<br/>";

    $main = new DSS_Main();
    $Weight_Score = array('price' => $_POST['price'],'time' => $_POST['time'], 'genre' => $_POST['gen'] ,
        'rating' => $_POST['rate'], 'seat_no' => $_POST['seat'], 'producer'=>$_POST['pro']);
    $resultset = $main->Decision_Making($ArrayRequired,$Weight_Score);
    if(count($resultset)>0){
        print_r($resultset);
    }
    else echo "Không có phim thỏa mãn";
}
?>
