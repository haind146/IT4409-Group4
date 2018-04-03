<?php
    require_once ('../Private/initialize.php');
    $username = $_GET['username'];
    $user = User::find_by_username($username);
    if ($user == false) echo "0";
    else echo '1';
?>