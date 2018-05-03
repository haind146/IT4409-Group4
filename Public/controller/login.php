<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 5/2/2018
 * Time: 9:18 PM
 */

require_once("../../Private/initialize.php");

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
        $session->message("login denied");

        redirect_to(url_for("login.php"));

    }
}