<?php
header("Content-type: text/html; charset=utf-8");
class DB_Driver {
    private $__connect;

    //connect function
    public function connect() {
        if(!$this->__connect) {
            $this->__connect = mysqli_connect('localhost','root','123456','cinemaproject')
                        or die ('Connection failed: '.$__connect->connect_error);
            //Process font error
            mysqli_query($this->__connect,"SET character_set_results = 'utf8' , character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }

    //disconnect function
    public function dis_connect() {
        if($this->__connect) {
            mysqli_close($this->__connect);
        }
    }

    //get data
    public function select($column = "*", $table, $where = null, $order = null) {
        $sqlcmd = 'SELECT '.$column.' FROM '.$table;
        if($where != null){
            $sqlcmd .= ' WHERE '.$where;
        }
        if($order != null){
            $sqlcmd .= ' ORDER BY '.$order;
        }
        $this->connect();
        
        $result = mysqli_query($this->__connect,$sqlcmd);
        if(!$result) {
            die("Error syntax in query statement");
        }

        $return = array();
        while($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }

        //delete result temp%
        mysqli_free_result($result);
        return $return;
    }

    /**
     * insert function
     * $column is an array like $column = [movie_id,name,producer];
     * $value is also an array contain value: $value = [1,"havana","cuba"]
     * length of column must be equals length of value
     * each call insert, insert only one row into table 
     */
    public function insert($table,$column,$values){
        if(count($column) == count($values)){
            $sqlcmd = 'INSERT INTO '.$table;
            $sqlcmd .= '(';
            for($i = 0 ; $i < count($column) - 1; $i++) {
                $sqlcmd .= $column[$i].',';
            }
            $sqlcmd .= $column[$i].')';
            $sqlcmd .= ' VALUES (';
            for($i = 0; $i < count($values) - 1; $i++) {
                $sqlcmd .= $values[$i].',';
            }
            $sqlcmd .= $values[$i].')';

            $this->connect();
            
            #echo "<br/>Your query is :".$sqlcmd."<br/>";
            $result = mysqli_query($this->__connect,$sqlcmd);
            if(!$result){
                die('ERROR: Can not insert data. Check you query again');
                return false;
            } else {
                return true;
            }
        } else {
            die('ERROR: Number of column you want to insert is not equal to number of value');
            return false;
        }
    }

    //Manually query
    public function manualQuery($SQLcmd){
        $this->connect();

        $result = mysqli_query($this->__connect,$SQLcmd);
        if(!$result) {
            die("Error syntax in query statement");
        }

        $return = array();
        while($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }

        //delete result temp%
        mysqli_free_result($result);
        return $return;
    }

    public function getData($min_price,$max_price,$start_date,$end_date,$start_time,$end_time,$genre=null,$rating=null,$seat_no=null,$producer=null){
        $SQLcmd = "SELECT ticket_id,price,start_time,genre,rating,seat_no,producer";
        $SQLcmd .= " FROM movie, schedule, ticket";
        $SQLcmd .= " WHERE (movie.movie_id = schedule.movie_id)";
        $SQLcmd .= " AND (schedule.schedule_id = ticket.schedule_id)";
        $SQLcmd .= " AND (ticket.status = 1)";
        $SQLcmd .= " AND (cast(start_time as date) BETWEEN '$start_date' AND '$end_date')";
        $SQLcmd .= " AND (price BETWEEN $min_price AND $max_price)";
        $SQLcmd .= " AND (cast(start_time as time) BETWEEN '$start_time' AND '$end_time')";
        if($genre){
            $SQLcmd .= " AND (genre LIKE '%$genre%')";
        }
        if($rating){
            $SQLcmd .= " AND (rating >= $rating)";
        }
        if($seat_no){
            $SQLcmd .= " AND (seat_no = $seat_no)";
        }
        if($producer){
            $SQLcmd .= " AND (producer = $producer)";
        }
        $this->connect();
        
        //echo "<hr/>".$SQLcmd."<hr/>";
        
        $result = mysqli_query($this->__connect,$SQLcmd);
        if(!$result) {
            die("Error syntax in query statement");
        }

        $return = array();
        while($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }

        //delete result temp%
        mysqli_free_result($result);
        $this->dis_connect();
        return $return;
    }

    public function get_no_seat_of_room($sticket_id)
    {
        # code...
    }

    public function readvietnamese()
    {
        $SQLcmd = "SELECT * FROM movie WHERE movie_id = 9";
        $this->connect();
        $result = mysqli_query($this->__connect,$SQLcmd);
        if(!$result) {
            die("Error syntax in query statement");
        }

        $return = array();
        while($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }

        //delete result temp%
        mysqli_free_result($result);
        $this->dis_connect();
        return $return;
    }
}
?>
