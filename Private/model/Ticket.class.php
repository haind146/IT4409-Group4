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
    static protected $columns = ['ticket_id','schedule_id','customer_id','seat_no','price','status'];

    public $id;
    public $ticket_id;
    public $schedule_id;
    public $customer_id;
    public $seat_no;
    public $price;
    public $status;

    public function __construct($schedule_id = "", $customer_id = "", $seat_no = "" ,$price = "",$status = "")
    {
        $this->schedule_id = $schedule_id;
        $this->customer_id = $customer_id;
        $this-> seat_no = $seat_no;
        $this->price = $price;
        $this->status = $status;
    }
}