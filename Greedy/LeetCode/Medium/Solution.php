<?php

class Solution {

    /**
     * @param Integer $target
     * @param Integer $maxDoubles
     * @return Integer
     */
    function minMoves($target, $maxDoubles) {

        $result = 0;
        $start = $target;

        while ($maxDoubles && $start > 1) {

            $split = floor($start / 2);

            $remainder = $start - $split * 2;

            $result += $remainder + 1;
            
            $start = $split;

            $maxDoubles--;
        }

        $result += $start - 1;

        return $result;
    }
}
