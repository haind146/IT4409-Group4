<?php

class SolutionCalculator {
    private $GoodSolution;
    private $BadSolution;
    private $DTable_Weighted;

    public function SolutionCalculator($DTable_Weighted){
        $this->DTable_Weighted = $DTable_Weighted;
    }

    public function get_GoodSolution()
    {
        $Values = array_values($this->DTable_Weighted);
        $BestPrice = max(array_column($Values,'price'));
        $BestTime = max(array_column($Values,'start_time'));
        $BestGenre = max(array_column($Values,'genre'));
        $BestRating = max(array_column($Values,'rating'));
        $BestSeatNo = max(array_column($Values,'seat_no'));
        $BestProducer = max(array_column($Values,'producer'));
        $GoodSolution = array($BestPrice,$BestTime,$BestGenre,$BestRating,$BestSeatNo,$BestProducer);
        return $GoodSolution;
    }

    public function get_BadSolution()
    {
        $Values = array_values($this->DTable_Weighted);
        $BadPrice = min(array_column($Values,'price'));
        $BadTime = min(array_column($Values,'start_time'));
        $BadGenre = min(array_column($Values,'genre'));
        $BadRating = min(array_column($Values,'rating'));
        $BadSeatNo = min(array_column($Values,'seat_no'));
        $BadProducer = min(array_column($Values,'producer'));
        $BadSolution = array($BadPrice,$BadTime,$BadGenre,$BadRating,$BadSeatNo,$BadProducer);
        return $BadSolution;
    }
}
?>