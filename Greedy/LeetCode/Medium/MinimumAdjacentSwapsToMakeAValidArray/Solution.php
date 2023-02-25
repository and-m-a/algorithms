<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumSwaps($nums) {
        
        $min = PHP_INT_MAX;
        $minI = null;
        $max = 0;
        $maxI = null;

        foreach ($nums as $i => $num) {
            if ($min > $num) {
                $min = $num;
                $minI = $i;
            }

            if ($max <= $num) {
                $max = $num;
                $maxI = $i;
            }
        }

        $count = count($nums);
        $result = $minI + $count - $maxI - 1;

        if ($minI > $maxI) {
            $result--;
        }

        return $result;
    }
}
