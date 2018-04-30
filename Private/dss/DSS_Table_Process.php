<?php
require_once 'DB_Driver.php';
require_once 'User_Required.php';
require_once 'ProcessData.php';

$UserRequired = new User_Required();


class DSS_Table_Process{
    private $DSSTable = array();

    public function DSS_Table_From_Required($arrayRequired){
        $DBconnector = new DB_Driver();
        $ProcessData = new ProcessData();
        $result = $DBconnector->getData($arrayRequired['min_price'],$arrayRequired['max_price'],$arrayRequired['start_time'],$arrayRequired['end_time'],null,null,null,null);

        # Matrixalization
        $DSSTable = array();
        foreach($result as $row){
            $key = $row['id'];
            $value = array_slice($row,1,6);
            $DSSTable[$key] = $value;
        }

        # After Generation
        $price_arr = array();
        $time_arr = array();
        $genre_arr = array();
        $rating_arr = array();
        $seat_no_arr = array();
        $producer_arr = array();

        foreach ($DSSTable as $key => $value) {
            $price_arr[] = $value['price'];
            $time_arr[]  = $value['start_time'];
            $genre_arr[] = $value['genre'];
            $rating_arr[] = $value['rating'];
            $seat_no_arr[] = $value['seat_no'];
            $producer_arr[] = $value['producer'];
        }

        # Get value from process
        $priceAP = $ProcessData->price_process($arrayRequired['min_price'],$price_arr);
        $timeAP  = $ProcessData->time_process($arrayRequired['start_time'],$time_arr);
        $genreAP = $ProcessData->genre_process($arrayRequired['genre'],$genre_arr);
        $ratingAP = $ProcessData->rating_process($arrayRequired['rating'],$rating_arr);
        $seat_noAP = $ProcessData->seat_no_process($arrayRequired['seat_no'],$seat_no_arr,27);
        $producerAP = $ProcessData->producer_process($arrayRequired['producer'],$producer_arr);


        $index = 0;
        foreach ($DSSTable as $key => $value) {
            $DSSTable[$key]['price'] = $priceAP[$index];
            $DSSTable[$key]['start_time'] = $timeAP[$index];
            $DSSTable[$key]['genre'] = $genreAP[$index];
            $DSSTable[$key]['rating'] = $ratingAP[$index];
            $DSSTable[$key]['seat_no'] = $seat_noAP[$index];
            $DSSTable[$key]['producer'] = $producerAP[$index];
            $index ++;
        }
        return $DSSTable;
    }
}
?>