<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/16/2018
 * Time: 10:24 PM
 */

class Ticket extends DatabaseObject
{
    static protected $tableName = 'ticket';
    static protected $columns = ['ticket_id','schedule_id','user_id','seat_no','price','status'];

    public $id;
    public $schedule_id;
    public $user_id;
    public $seat_no;
    public $price;
}