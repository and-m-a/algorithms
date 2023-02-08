<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumOperations($nums) {
        
        $result = 0;

        $i = 0;
        $j = count($nums) - 1;

        $left = $nums[$i];
        $right = $nums[$j];

        while ($i < $j) {

            if ($left < $right) {
                $i++;
                $result++;
                $left += $nums[$i];
            } else if ($left > $right) {
                $j--;
                $result++;
                $right += $nums[$j];
            } else {
                $i++;
                $j--;

                $left = $nums[$i];
                $right = $nums[$j];
            }
        }

        return $result;
    }
}
