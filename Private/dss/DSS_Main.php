<?php
header("Content-type: text/html; charset=utf-8");
include_once 'Utils.php';
include_once 'SolutionCalculator.php';
include_once 'Weight.php';

class DSS_Main {

    /**
     * User_Requierd : array user required
     * Weight_Score : array weight is array 
     */
    public function Decision_Making($User_Required,$Weight_Score){
        # STEP 0: Declare function from other php file
        $Utils = new Utils();

        # STEP 1: Weight by user, calculated in other file
        $Weight_Maker = new Weight($Weight_Score['price'],$Weight_Score['time'],$Weight_Score['genre'],$Weight_Score['rating'],$Weight_Score['seat_no'],$Weight_Score['producer']);
        $Weight = $Weight_Maker->result();

        # STEP 2: Calculate the normalized decision matrix. 
        $DTable_Generated = $Utils->DTable_Generating($User_Required);

        # STEP 3: Calculate the weighted normalized decision matrix
        $DTable_Weighted = $Utils->DTable_Weighting($Weight,$DTable_Generated);

        # STEP 4: Determine the positive ideal and negative ideal solutions.
        $SolCalr = new SolutionCalculator($DTable_Weighted);
        $PosIdealSolution = $SolCalr->get_GoodSolution();
        $NegIdealSolution = $SolCalr->get_BadSolution();

        /*
        # STEP 5: Calculate the separation measures from the positive ideal solution 
                    and the negative ideal solution.
        */
            //Sub step 5.1:
            # The separation of each alternative from the positive ideal solution is given as:
            $DistancePos = $Utils->distanceToSolution($PosIdealSolution,$DTable_Weighted);

            //Sub step 5.2:
            # The separation of each alternative from the negative ideal solution is given as:
            $DistanceNeg = $Utils->distanceToSolution($NegIdealSolution,$DTable_Weighted);

        # STEP 6: Calculate the relative closeness to the positive ideal solution
        foreach ($DistancePos as $key => $value) {
            $Relative_Closeness[$key] = round($DistanceNeg[$key]/($DistanceNeg[$key]+$DistancePos[$key]),6);
        }

        # STEP 7: Rank the preference order or select the alternative closest to 1
        // A set of alternatives now can be ranked by the descending order of the value of Relative Closenes
        arsort($Relative_Closeness);

        # LAST BUSINESS
        return $Relative_Closeness;
    }
}

?>
