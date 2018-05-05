<?php
//// //connect to the mysql
//require_once('../../Private/initialize.php');
//header('Content-Type: application/json; charset=UTF-8');
//$link = mysqli_connect("localhost", "root", "", "cinemaproject");
//$link->set_charset('utf8');
//
//
///* check connection */
//if (mysqli_connect_errno()) {
//   printf("Connect failed: %s\n", mysqli_connect_error());
//   exit();
//}
//
//// //database query
//$sql = "SELECT * FROM schedule limit 10";
//
//$sql =mysqli_query($link,  "SELECT name,poster_url,id FROM movie limit 10");
//
//$data = array();
//while($r = mysqli_fetch_assoc($sql)) {
// $data[] = $r;
//}
//
//// //echo result as json
//echo json_encode($data);

 require_once("../../../Private/initialize.php");

 $nowShowingMovies = Movie::getNowshowingMovie();

 echo json_encode($nowShowingMovies);
//  echo json_encode("asasd");


?>