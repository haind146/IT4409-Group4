<?php
/**
 * Created by PhpStorm.
 * User: Nguyễn Bá Khải
 * Date: 4/30/2018
 * Time: 9:37 PM
 */
include_once '../../Private/dss/DSS_Main.php';
include_once '../../Private/dss/User_Required.php';
require_once '../../Private/initialize.php';
if(!empty($_POST)){
    error_reporting(0);
//    print_r($_POST);
    header("Content-type: text/html; charset=utf-8");
    $start_date = date('Y-m-d', strtotime($_POST['date1']));
    $end_date = date('Y-m-d', strtotime($_POST['date2']));
    $st_time = $_POST['time1'].":00";
    $ed_time = $_POST['time2'].":00";

    $start_time = date('H:i:s',strtotime($st_time));
    $end_time = date('H:i:s', strtotime($ed_time));
    $UserRequired = new User_Required();
    $genre = implode($_POST['genre'],",");
    $UserRequired->setRequired($_POST['minprice'] ?? 0,$_POST['maxprice'] ?? 1000000 ,$start_date,$end_date,$start_time,$end_time,$genre,$_POST['rating'] ?? 1,$_POST['seatno'] ?? "G5",$_POST['producer'],$_POST['name'] ?? "");
    $ArrayRequired = $UserRequired->getUserRequired();

    $main = new DSS_Main();
    $Weight_Score = array('price' => $_POST['price'] ?? "5",'time' => $_POST['time'] ?? 5, 'genre' => $_POST['gen'] ?? 5 ,
        'rating' => $_POST['rate'] ?? 5, 'seat_no' => $_POST['seat'] ?? 5, 'producer'=>$_POST['pro'] ?? 5);
    $resultset = $main->Decision_Making($ArrayRequired,$Weight_Score);
    if(count($resultset)>0){
        if(count($resultset)>10){
            $i=0;
            $result = array();
            foreach ($resultset as $id=>$value){
                if($i==10) break;
                $ticket = Ticket::find_by_id($id);
                $schedule = Schedule::find_by_id($ticket->schedule_id);
                $movie = Movie::find_by_id($schedule->movie_id);
                $json = array();
                $json['id']=$id;
                $json['schedule_id']=$schedule->schedule_id;
                $json['duration']=$movie->$duration;
                $json['start_time']=$schedule->start_time;
                $json['price']=$ticket->price;
                $json['genre']=$movie->genre;
                $json['producer']=$movie->producer;
                $json['rating']=$movie->rating;
                $json['seat_no']=$ticket->seat_no;
                $json['movie_name']=$movie->name;
                array_push($result,$json);
                $i++;

            }
            echo json_encode($result);
        }
        else{
            $result = array();
            foreach ($resultset as $id=>$value){
                $ticket = Ticket::find_by_id($id);
                $schedule = Schedule::find_by_id($ticket->schedule_id);
                $movie = Movie::find_by_id($schedule->movie_id);
                $json = array();
                $json['id']=$id;
                $json['schedule_id']=$schedule->schedule_id;
                $json['start_time']=$schedule->start_time;
                $json['price']=$ticket->price;
                $json['duration']=$movie->duration;
                $json['genre']=$movie->genre;
                $json['producer']=$movie->producer;
                $json['rating']=$movie->rating;
                $json['seat_no']=$ticket->seat_no;
                $json['movie_name']=$movie->name;
                array_push($result,$json);

            }
            echo json_encode($result);
        }
    }
    else echo "NO";
}
?>
