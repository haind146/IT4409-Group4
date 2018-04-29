<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/28/2018
 * Time: 9:49 PM
 */
require_once ('../Private/initialize.php');

$session->logout();

redirect_to(url_for('/index.php'));

?>