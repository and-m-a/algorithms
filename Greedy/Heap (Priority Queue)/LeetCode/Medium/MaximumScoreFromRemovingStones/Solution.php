<?php

class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function maximumScore($a, $b, $c) {
        
        $score = 0;

        $heap = new SplMaxHeap();
        $heap->insert($a);
        $heap->insert($b);
        $heap->insert($c);

        while ($heap->count() > 1) {
            $score++;

            $max = $heap->extract();
            $mid = $heap->extract();

            if ($max > 1) {
                $heap->insert($max - 1);
            }

            if ($mid > 1) {
                $heap->insert($mid - 1);
            }
        }

        return $score;
    }
}
