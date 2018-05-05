<?php

 require_once('../../../Private/initialize.php');

header('Content-Type: application/json; charset=UTF-8');
if(isset($_GET['movie_id'])){
    $movie_id = $_GET['movie_id'];

    $data=Schedule::find_schedule_by_movie($movie_id);
    echo json_encode($data);


}


?>

