<?php

class Solution {

    private $cache = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    function getMoneyAmount($n) {
        return $this->guess(1, $n);
    }

    function guess(int $start, int $end) {

        if ($start >= $end) {
            return 0;
        }

        if (isset($this->cache[$start][$end])) {
            return $this->cache[$start][$end];
        }

        $min = PHP_INT_MAX;

        for ($i = $start; $i < $end; $i++) {
            $lower = $i + $this->guess($start, $i - 1);
            $higher = $i + $this->guess($i + 1, $end);

            $result = $lower > $higher ? $lower : $higher;

            if ($min > $result) {
                $min = $result;
            }
        }

        return $this->cache[$start][$end] = $min;
    }
}
