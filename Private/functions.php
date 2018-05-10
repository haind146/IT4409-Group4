<?php

function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function u($string="") {
    return urlencode($string);
}

function raw_u($string="") {
    return rawurlencode($string);
}

function h($string="") {
    return htmlspecialchars($string);
}

function error_404() {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

function error_500() {
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}


function require_admin_login(){
    global $session;
    if($session->is_logged_in()&&$session->role === 'admin') {
        // let page proceed

    } else {
        redirect_to(url_for('/login.php'));
    }
}

function require_member_login(){
    global $session;

    if($session->is_logged_in()&&$session->role === 'member') {
        // let page proceed

    } else {
        redirect_to(url_for('/login.php'));
    }
}

function include_header(){
    global $session;
    if ($session->role == "member") {
        include_once (SHARED_PATH . "/customer_header.php");
    } else if ($session->role == "admin") {
        include_once(SHARED_PATH . '/admin_header.php');
    } else include_once (SHARED_PATH . '/public_header.php');
}

function include_footer(){
    global $session;
    if ($session->role == "member") {
        include_once (SHARED_PATH . "/customer_footer.php");
    } else if ($session->role == "admin") {
        include_once(SHARED_PATH . '/admin_footer.php');
    } else include_once (SHARED_PATH . '/public_footer.php');
}

function money_format($priceFloat) {
    $symbol = 'đ';
    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price.$symbol;
}
?>


