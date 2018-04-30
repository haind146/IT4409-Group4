<?php

 require_once('../../Private/initialize.php');

header('Content-Type: application/json; charset=UTF-8');
$movie_id = $_GET['name'];

$data=Schedule::find_schedule_by_movie($movie_id);
echo json_encode($data);

?>

