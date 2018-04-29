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
    static protected $columns = ['id','movie_id','room_id','start_time'];

    public $id;
    public $movie_id;
    public $room_id;
    public $start_time;

    public function __construct($arg = [])
    {
        $this->movie_id = $arg['movie_id'] ?? "";
        $this->room_id = $arg['room_id'] ?? "";
        $this->start_time = $arg['start_time'] ?? "";
    }

    static public function find_schedule_by_movie($movie_id){
        $sql = "SELECT * FROM schedule WHERE movie_id = '" . $movie_id . "' ";
        $sql.= "AND start_time> now() ";
        return static::find_by_sql($sql);
    }

    static public function find_schedule_by_date($date){
        $sql = "SELECT * FROM schedule WHERE start_time BETWEEN '";
        $sql .= $date ."' AND '" . $date . " 23:59:59';";
        return static::find_by_sql($sql);
}

}