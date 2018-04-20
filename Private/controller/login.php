<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/14/2018
 * Time: 4:48 PM
 */
require_once ('../initialize.php');
if(is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $user = User::find_by_username($username);

    if ($user != false && $user->verify_password($password)){
        global $session;
        $session->login($user);
        header(PUBLIC_PATH . "/admin/home.php");
    }
    else {
        header(PUBLIC_PATH . "/cellIndex.php");
    }
}

?>