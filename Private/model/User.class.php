<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/16/2018
 * Time: 10:24 PM
 */

class User extends DatabaseObject
{
    static protected $tableName = 'user';
    static protected $columns = ['id','firstname','lastname','email','phonenumber','address','date_of_birth','username','hashed_password','role'];

    public $firstname;
    public $lastname;
    public $id;
    public $username;
    public $password;
    public $phonenumber;
    public $address;
    public $role;
    public $email;
    public $date_of_birth;
    protected $hashed_password;

    public function __construct($arg = [])
    {
        $this->firstname = $arg['firstname'] ?? '';
        $this->lastname = $arg['lastname'] ?? '';
        $this->phonenumber = $arg['phonenumber'];
        $this->username = $arg['username'] ?? '';
        $this->password = $arg['password'] ?? '';
        $this->role = $arg['role'] ?? '';
        $this->email = $arg['email'] ?? '';
        $this->address = $arg['address'] ?? '';
        $this->date_of_birth = $arg['date_of_birth'] ?? '';
    }

    function setHashedPassword(){
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function verify_password($password) {
        return password_verify($password, $this->hashed_password);
    }

    public function create()
    {
        $this->setHashedPassword();
        return parent::create(); // TODO: Change the autogenerated stub
    }


    static public function find_by_username($username){
        $sql = "SELECT * FROM " . static::$tableName . " ";
        $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }


}