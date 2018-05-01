<?php 
header("Content-type: text/html; charset=utf-8");
    class Weight{
        private $price;
        private $time;
        private $genre;
        private $quality;
        private $place;
        private $studio;

        public function Weight($price, $time, $genre, $quality, $place, $studio){
            $this->price = $price;
            $this->time = $time;
            $this->genre = $genre;
            $this->quality = $quality;
            $this->place = $place;
            $this->studio = $studio;
        }

        public function geometricMean($arr1, $attribute){
            $tg = 1;
            $arr2 = array();
            $tg1 = count($arr1);
            for($i = 0; $i<$tg1; $i++){
                if($arr1[$i] == 0 || $attribute == 0){
                    return 0;
                }
                else {
                    $arr2[$i] = $attribute / $arr1[$i];
                    $tg = $tg * $arr2[$i];
                }
            }
            return pow($tg, 1/$tg1);

        }

        public function result(){
            $arr = array($this->price, $this->time, $this->genre, $this->quality, $this->place, $this->studio);
            $arrkq1 = array();
            $arrkq  = array();
            $tg1 = 0;
            for($i = 0 ; $i<count($arr); $i++){
                array_push($arrkq1, $this->geometricMean($arr, $arr[$i]));
                $tg1 += $arrkq1[$i];
            }
            
            for($j = 0; $j<count($arrkq1); $j++){
                $tg2 = $arrkq1[$j] / $tg1;
                array_push($arrkq, round($tg2, 7));
            }

            return $arrkq;
        }
    }
?>
