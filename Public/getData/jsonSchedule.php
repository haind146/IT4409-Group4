<?php
////connect to the mysql
//header('Content-Type: application/json; charset=UTF-8');
//$id = $_GET['name'];
//$link = mysqli_connect("localhost", "root", "", "cinemaproject");
//$link->set_charset('utf8');
///* check connection */
//if (mysqli_connect_errno()) {
//    printf("Connect failed: %s\n", mysqli_connect_error());
//    exit();
//}
//
////database query
//// $name="và em sẽ đến";
//$query="select name,room_id,start_time FROM schedule,movie where schedule.movie_id=movie.id and movie.id='$id'";
//$sql =mysqli_query($link,$query );
//
//$data = array();
//while($r = mysqli_fetch_assoc($sql)) {
//  $data[] = $r;
//}
//
////echo result as json
//echo json_encode($data);
//// echo json_encode($name);
require_once ("../../Private/initialize.php");

if(is_get_request()){
    header('Content-Type: application/json; charset=UTF-8');
    if(isset($_GET["movie_id"])){
        $movie_id = $_GET["movie_id"];
        $schedules = Schedule::find_schedule_by_movie($movie_id);
        echo json_encode($schedules);
    }
}
?>