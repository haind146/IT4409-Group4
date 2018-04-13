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
    static protected $columns = ['schedule_id','movie_id','room_id','start_time'];

    public $schedule_id;
    public $movie_id;
    public $room_id;
    public $start_time;


}