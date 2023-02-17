<?php

class Solution {

    /**
     * @param Integer[] $rowSum
     * @param Integer[] $colSum
     * @return Integer[][]
     */
    function restoreMatrix($rowSum, $colSum) {
        
        $result = [];

        foreach ($rowSum as $rI => $rowMax) {

            foreach ($colSum as $cI => $colMax) {

                $max = $rowMax > $colMax ? $colMax : $rowMax;

                $result[$rI][$cI] = $max;

                $rowMax -= $max;
                $colSum[$cI] -= $max;
            }
        }     

        return $result;
    }
}
