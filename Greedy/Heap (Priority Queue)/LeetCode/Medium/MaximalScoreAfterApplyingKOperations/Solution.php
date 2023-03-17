<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxKelements($nums, $k) {
        $heap = new SplMaxHeap();

        foreach ($nums as $num) {
            $heap->insert($num);
        }

        $score = 0;

        while ($k > 0) {
            $k--;

            $score += $max = $heap->extract();

            $heap->insert(ceil($max / 3));
        }

        return $score;
    }
}
