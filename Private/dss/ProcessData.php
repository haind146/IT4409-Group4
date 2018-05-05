<?php
header("Content-type: text/html; charset=utf-8");
class ProcessData {
    private $__result;

    public function price_process($price_required,$price_array) {
        $price_indexed = array();
        # This function will ignore duplicate values
        foreach ($price_array as $price) {
            $price_indexed[$price] = $price;
        }

        # Vector nomalization
        $root = 0;
        foreach ($price_indexed as $key => $value) {
            $root += (1/$value)**2;
        }

        $denominator = sqrt($root);

        foreach ($price_indexed as $key => $value) {
            $price_indexed[$key] = round((1/$value)/$denominator,10);
        }
        foreach ($price_indexed as $key => $value) {
            foreach ($price_array as $nkey => $nvalue) {
                if($nvalue == $key){
                    $price_array[$nkey] = $value;
                }
            }
        }
        return $price_array;
    }

    public function time_process($time_required,$time_array){
        $time_indexed = array();
        foreach ($time_array as $time) {
            $timearr = explode(' ',$time);
            $time_indexed[$time] = $timearr[1];
        }
        # Time string to timestamp
        $finaltime = strtotime('00:00:00');
        foreach ($time_indexed as $key => $value) {
            $time_indexed[$key] = abs(strtotime($value) - $finaltime);
        }

        # Vector nomalization
        $root = 0;
        foreach ($time_indexed as $key => $value) {
            $root += (1/$value)**2;
        }
        
        $denominator = sqrt($root);
        foreach ($time_indexed as $key => $value) {
            $time_indexed[$key] = round((1/$value)/$denominator,10);
        }
        # Return value
        foreach ($time_indexed as $key => $value) {
            foreach ($time_array as $nkey => $nvalue) {
                if($nvalue == $key){
                    $time_array[$nkey] = $value;
                }
            }
        }
        return $time_array;
    }

    public function genre_process($genre_required, $genre_array){
        //Each value of $genre_array and $genre_required are a list of strings
        # Indexed genre_array
        $genre_indexed = array();
        foreach ($genre_array as $key => $value) {
            $genre_indexed[$value] = $value;
        }

        # Arrayalization each $value
        foreach ($genre_indexed as $key => $value) {
            $arrayaliztion = explode(',',$value);
            foreach ($arrayaliztion as $akey => $avalue) {
                $arrayaliztion[$akey] = trim($avalue);
            }
            $genre_indexed[$key] = $arrayaliztion;
        }
        
        $genre_required= explode(',',$genre_required);
        foreach ($genre_required as $key => $value) {
            $genre_required[$key] = trim($value);
        }

        # Make value for each element of $genre_indexed
        foreach ($genre_indexed as $key => $value) {
            $count = 0;
            foreach ($genre_required as $nkey => $nvalue) {
                if(in_array($nvalue,$value)){
                    $count ++;
                }
            }
            $genre_indexed[$key] = round($count/count($value),6);
        }
        
        # Return value 
        foreach ($genre_indexed as $key => $value) {
            foreach ($genre_array as $nkey => $nvalue) {
                if($key == $nvalue){
                    $genre_array[$nkey] = $value;
                }
            }
        }
        return $genre_array;
    }

    public function rating_process($rating_required, $rating_array){
        $rating_indexed = array();
        foreach ($rating_array as $rating) {
            $rating_indexed[$rating] = $rating;
        }

        # Linear generation
        $maxrating = max(array_values($rating_indexed));
        foreach ($rating_indexed as $key => $value) {
            $rating_indexed[$key] = round($value/$maxrating,6);
        }

        #return value to rating_array
        foreach ($rating_indexed as $key => $value) {
            foreach ($rating_array as $nkey => $nvalue) {
                if($key == $nvalue){
                    $rating_array[$nkey] = $value;
                }
            }
        }
        return $rating_array;
    }

    public function convert_seat($seat_no_arr,$no_seat_a_row){
        # This is a seat, not array
        $char_arr = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','X','Y','Z'];
        $char = $seat_no_arr[0];
        foreach($char_arr as $key => $value) {
            if($char == $value){
                $seat_no_arr = $key*$no_seat_a_row + ((int)substr($seat_no_arr,1));
            }
        }
        return $seat_no_arr;
    }

    public function seat_no_process($seat_no_required, $seat_no_arr, $no_seat_a_row){
        # Convert to number
        if($seat_no_required == null){
            $seat_no_required = 'E7';
        }
        $seat_no_array = array();
        foreach ($seat_no_arr as $key => $value) {
            $seat_no_array[$key] = $this->convert_seat($value,$no_seat_a_row);
        }
        $seat_no_required = $this->convert_seat($seat_no_required,$no_seat_a_row);

        # indexed
        $seat_no_indexed = array();
        foreach ($seat_no_array as $key => $value) {
            $seat_no_indexed[$value] = $value;
        }

        # Vector normalization
        foreach ($seat_no_indexed as $key => $value) {
            $seat_no_indexed[$key] = abs($value - $seat_no_required) + 1;
        }
        
        $root = 0;
        foreach ($seat_no_indexed as $key => $value) {
            $root += (1/$value)**2;
        }

        $denominator = sqrt($root);
        
        foreach ($seat_no_indexed as $key => $value) {
            $seat_no_indexed[$key] = round((1/$value)/$denominator,10);
        }

        # return value
        foreach ($seat_no_indexed as $key => $value) {
            foreach ($seat_no_array as $nkey => $nvalue) {
                if($nvalue == $key) {
                    $seat_no_array[$nkey] = $value;
                }
            }
        }
        return $seat_no_array;
    }

    public function producer_process($producer_required, $producer_arr){
        # indexd 
    
        $producer_indexed = array();
        foreach ($producer_arr as $producer) {
            $producer_indexed[$producer] = $producer;
        }

        # valualize
        foreach ($producer_indexed as $key => $value) {
            foreach ($producer_required as $nkey => $nvalue) {
                if($value == $nvalue){
                    $producer_indexed[$key] = $nkey+1;
                }
            }
        }
        foreach($producer_indexed as $key => $value){
            if(!is_numeric($value)){
                $producer_indexed[$key] = 5;
            }
        }
        $maxproducer = max(array_values($producer_indexed));
        foreach ($producer_indexed as $key => $value) {
            $producer_indexed[$key] = round(($maxproducer-$value)/$maxproducer,6);
        }

        # return value
        foreach ($producer_indexed as $key => $value) {
            foreach ($producer_arr as $nkey => $nvalue) {
                if($key == $nvalue){
                    $producer_arr[$nkey] = $value;
                }
            }
        }
        return $producer_arr;
    }
}

?>
