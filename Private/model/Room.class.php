<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/16/2018
 * Time: 10:23 PM
 */

class Room extends DatabaseObject
{
    static protected $tableName = 'room';
    static protected $columns = ['id','name','number_of_seat','width','height'];

    public $id;
    public $name;
    public $number_of_seat;
    public $width;
    public $height;


}