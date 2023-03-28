<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function makePrefSumNonNegative($nums) {

        $operations = 0;
        $sum = 0;
        $i = 0;

        $negativeHeap = new SplMinHeap();

        while (isset($nums[$i])) {

            $current = $nums[$i];

            if ($current < 0) {
                $negativeHeap->insert($current);
            }

            if ($sum + $current >= 0) {
                $sum += $current;
            } else {
                $operations++;
                $currentMin = $negativeHeap->extract();
                $nums[] = $currentMin;
                $sum -= $currentMin;
                $sum += $current;
            }

            $i++;
            unset($nums[$i]);
        }

        return $operations;
    }
}
