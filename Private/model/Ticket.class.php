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

    static public function find_by_schedule($schedule_id){
        $sql = "SELECT * FROM ticket WHERE schedule_id = '" . $schedule_id . "'";
        return Ticket::find_by_sql($sql);
    }

    static public function find_ticket($schedule_id,$seat_no) {
        $sql = "SELECT * FROM ticket WHERE schedule_id = '" . $schedule_id . "' AND seat_no = '" . $seat_no . "';";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }
    public function setID(){
        $this->id = $this->ticket_id;
    }
    public function set_booked(){
        $this->status = 0;
    }
    public function set_customer($customer_id){
        $this->customer_id = $customer_id;
    }
}