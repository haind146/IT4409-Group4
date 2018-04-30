<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/30/2018
 * Time: 3:35 PM
 */
require_once ("../private/initialize.php");

$ticket = new Ticket(1,"",3,4,5);
$ticket->save();
echo $database->error;