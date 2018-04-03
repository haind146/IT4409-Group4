<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/18/2018
 * Time: 11:57 PM
 */

class DatabaseObject
{
    static protected $database;
    static protected $tableName = "";
    static protected $columns=[];

    protected $id;
    // return list attributes as array (key=>value)
    public function attributes(){
        $attributes = [];
        foreach (static::$columns as $column){
            if ($column == 'id') {continue;}
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }


    function set_database($database){
        self::$database = $database;
    }

    // escape string to prevent  sql-injection attack
    public function sanitized_attributes(){
        $sanitized = [];
        foreach ($this->attributes() as $key => $value){
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

     function create(){

         $attributes = $this->sanitized_attributes();
         $sql = "INSERT INTO " . static::$tableName . " (";
         $sql .= join(', ', array_keys($attributes));
         $sql .= ") VALUES ('";
         $sql .= join("', '", array_values($attributes));
         $sql .= "')";
         $result = self::$database->query($sql);
         if($result) {
             $this->id = self::$database->insert_id;
         }
         return $result;
    }
     function update(){

    }
     function delete(){

    }



    static public function find_by_sql($sql) {
        $result = self::$database->query($sql);
        if(!$result) {
            exit("Database query failed.");
        }

        // results into objects
        $object_array = [];
        while($record = $result->fetch_assoc()) {
            $object_array[] = static::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    static protected function instantiate($record) {
        $object = new static;
        // Could manually assign values to properties
        // but automatically assignment is easier and re-usable
        foreach($record as $property => $value) {
            if(property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }
}