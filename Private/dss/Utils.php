<?php
header("Content-type: text/html; charset=utf-8");
require_once 'DB_Driver.php';
require_once 'ProcessData.php';

class Utils {
    public function distance($vectorA, $vectorB)
    {
        $size = count($vectorA);
        $sum = 0;
        for ($i=0; $i < $size; $i++) { 
            $sum += ($vectorA[$i]-$vectorB[$i])**2;
        }
        return sqrt($sum);
    }

    public function distanceToSolution($solution,$DSS_Weighted)
    {
        foreach ($DSS_Weighted as $key => $value) {
            $nvalue = array($value['price'],$value['start_time'],$value['genre'],$value['rating'],$value['seat_no'],$value['producer']);
            $DSS_Weighted[$key] = $this->distance($solution,$nvalue);
        }
        return $DSS_Weighted;
    }

    /**
     * <h1>Calculate the weighted nomalized matrix</h1>
     * The follow function to weighting the matrix which was nomalized by DTable_Generating
     * function
     * <p>
     * @return $DSS_Table - which is weighted nomalized matrix
     */
    public function DTable_Weighting($Weight,$DSS_Table) {
        foreach ($DSS_Table as $key => $value) {
            $index = 0;
            $newvalue = array();
            foreach ($value as $nkey => $nvalue) {
                $newvalue[$nkey] = $nvalue*$Weight[$index];
                $index += 1;
            }
            $DSS_Table[$key] = $newvalue;
        }
        return $DSS_Table;
    }

    /**
     * <h1>Calculate the nomalized decision matrix</h1>
     * Follow nomalized decision matrix function called DTable_Generating
     * <p>
     * <b>Note:</b> I named this function is DTable_Generating and used in
     * some function later, that's why i don't want to change this name.
     * <p>
     * This program, I calculated nomalized decision matrix by linear function
     */
    public function DTable_Generating($arrayRequired){
        $DBconnector = new DB_Driver();
        $ProcessData = new ProcessData();
        $result = $DBconnector->getData($arrayRequired['min_price'],$arrayRequired['max_price'],$arrayRequired['start_date'],$arrayRequired['end_date'],$arrayRequired['start_time'],$arrayRequired['end_time'],null,null,null,null);

        # Matrixalization
        $DSSTable = array();
        foreach($result as $row){
            $key = $row['ticket_id'];
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
