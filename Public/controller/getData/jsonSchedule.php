<?php

 require_once('../../../Private/initialize.php');

header('Content-Type: application/json; charset=UTF-8');
if(isset($_GET['movie_id'])){
    $movie_id = $_GET['movie_id'];

    $data=Schedule::find_schedule_by_movie(5);
    echo json_encode($data);


}


?>

