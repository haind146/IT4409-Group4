<?php
    class DSS_Attribute {
        private $price_ticket;
        private $start_time;
        private $genre;
        private $rating;
        private $seat_no;
        private $producer;
        
        public function setData($price_ticket = null, $start_time = null,$genre = null,$rating = null,$seat_no = null,$producer = null){
            $this->price_ticket = $price_ticket;
            $this->start_time = $start_time;
            $this->genre = $genre;
            $this->rating = $rating;
            $this->seat_no = $seat_no;
            $this->producer = $producer;
        }

        public function getData(){
            $return = array($this->price_ticket,$this->start_time,$this->genre,$this->rating,$this->seat_no,$this->producer);
            return $return;
        }
    }
    
?>