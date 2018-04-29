<?php
 require_once('../../Private/initialize.php');

 if($session->is_logged_in() && $session->role === 'admin'){
     redirect_to(url_for('/admin/home.php'));
 }


 if(is_post_request()) {
     $username = $_POST['username'] ?? '';
     $password = $_POST['password'] ?? '';
     $user = User::find_by_username($username);

     if ($user != false && $user->verify_password($password)){
         global $session;
         $session->login($user);
         redirect_to(url_for('/admin/home.php'));

     }
     else {
         redirect_to(url_for('/index.php'));
     }
 }
//connect to the mysql
header('Content-Type: application/json; charset=UTF-8');
$movie_id = $_GET['name'];
$link = mysqli_connect("localhost", "root", "", "cinemaproject");
$link->set_charset('utf8');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//database query
// $name="và em sẽ đến";
// $query="select name,room_id,start_time FROM schedule,movie where schedule.movie_id=movie.id and movie.id='$id'";
// $sql =mysqli_query($link,$query );
 
// $data = array();
// while($r = mysqli_fetch_assoc($sql)) {
//   $data[] = $r;
// }
// while($r = Schedule::find_schedule_by_movie(3)){
//   $data[] = $r;
// }
//echo result as json
$data=Schedule::find_schedule_by_movie($movie_id);
echo json_encode($data);
// echo json_encode($name);

?>