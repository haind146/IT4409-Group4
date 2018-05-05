<?php
class User_Required{
    private $min_price;
    private $max_price;
    private $start_date;
    private $end_date;
    private $start_time;
    private $end_time;
    private $genre;
    private $rating;
    private $seat_no;
    private $producer;
    private $namefilm;

    public function setRequired($min_price,$max_price,$start_date,$end_date,$start_time,$end_time,$genre=null,$rating=null,$seat_no=null,$producer=null,$namefilm=null){
        $this->min_price = $min_price;
        $this->max_price = $max_price;
        if($this->isValidDate($start_date) && $this->isValidDate($end_date)){
            $this->start_date = $start_date;
            $this->end_date = $end_date;
        } else {
            echo "Invalid date required";
        }
        if($this->isValidDate($start_time,'H:i:s') && $this->isValidDate($end_time,'H:i:s')){
            $this->start_time = $start_time;
            $this->end_time = $end_time;
        } else {
            echo "Invalid time required";
        }
        $this->genre = $genre;
        $this->rating = $rating;
        $this->seat_no = $seat_no;
        $this->producer = $producer;
        $this->namefilm = $namefilm;
    }
    public function getUserRequired(){
        $return = array('min_price' => $this->min_price, 'max_price' => $this->max_price,
                        'start_date'=> $this->start_date, 'end_date' => $this->end_date,
                        'start_time'=> $this->start_time, 'end_time' => $this->end_time,
                        'genre'     => $this->genre,      'rating'   => $this->rating,
                        'seat_no'   => $this->seat_no,    'producer' => $this->producer,
                        'namefilm'  => $this->namefilm);
        return $return;
    }

    function isValidDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}
?>