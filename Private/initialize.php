<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/19/2018
 * Time: 12:23 AM
 */
ob_start(); // turn on output buffering

// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/Public');
define("SHARED_PATH", PRIVATE_PATH . '/share');


$public_end = strpos($_SERVER['SCRIPT_NAME'], '/Public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);


require_once('database_functions.php');
require_once('db_credentials.php');
require_once('functions.php');

foreach(glob('model/*.class.php') as $file) {
    require_once($file);
}

function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
        include('model/' . $class . '.class.php');
    }
}
spl_autoload_register('my_autoload');

$database = db_connect();

DatabaseObject::set_database($database);

$session = new Session

?>