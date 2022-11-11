<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $difference
     * @return Integer
     */
    function longestSubsequence($arr, $difference) {

        $max = 0;
        $cache = [];

        foreach ($arr as $num) {

            $prev = $num - $difference;

            if (isset($cache[$prev])) {
                $current = $cache[$prev] + 1;
            } else {
                $current = 1;
            }

            if ($current > $max) {
                $max = $current;
            }

            $cache[$num] = $current;
        }

        return $max;
    }
}
