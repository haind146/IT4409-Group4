<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/16/2018
 * Time: 10:24 PM
 */

class Schedule extends DatabaseObject
{
    static protected $tableName = 'schedule';
    static protected $columns = ['schedule_id', 'movie_id', 'room_id', 'start_time'];


    public $schedule_id;
    public $movie_id;
    public $room_id;
    public $start_time;

    public function __construct($arg = [])
    {
        $this->movie_id = $arg['movie_id'] ?? "";
        $this->room_id = $arg['room_id'] ?? "";
        $this->start_time = $arg['start_time'] ?? "";
    }

    static public function find_schedule_by_movie($movie_id)
    {
        $sql = "SELECT * FROM schedule WHERE movie_id = '" . $movie_id . "' ";
        $sql .= "AND start_time> now() ";
        return static::find_by_sql($sql);
    }

    static public function find_schedule_by_date($date)
    {
        $sql = "SELECT * FROM schedule WHERE start_time BETWEEN '";
        $sql .= $date . "' AND '" . $date . " 23:59:59';";
        return static::find_by_sql($sql);
    }

    public function generate_ticket()
    {
        $sql = "INSERT INTO ticket (schedule_id, customer_id, seat_no, price, status) VALUES ";
        $room = Room::find_by_id($this->room_id);
        $char = 'A';
        $movie = Movie::find_by_id($this->movie_id);
        $price = $movie->ticket_price;

        for ($h = 1; $h < $room->height + 1; $h++) {

            for ($w=1;$w<16;$w++){
                if($w<$room->width/2+5 && $w>$room->width/2-5 && $h<$room->height/2+5 && $h >$room->height/2-5) {
                    $price = $price*1.5;
                }
                $seat_no = $char . $w;
                $sql.= "('" . $this->id . "','" . "1" . "','" . $seat_no . "','" . $price . "','" . 1 . "')" .",";

                if($w<$room->width/2+5 && $w>$room->width/2-5 && $h<$room->height/2+5 && $h >$room->height/2-5) {
                    $price = $price/1.5;
                }

            }
            $char++;

        }
        $sql = substr($sql,0,-1);

        return self::$database->query($sql);


    }


}