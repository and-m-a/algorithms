<?php

class Solution {

    private $prices = [];
    private $cache = [];

    /**
     * @param Integer $k
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($k, $prices) {
        $this->prices = $prices;

        return $this->sub(0, $k, false);
    }

    function sub(int $day, int $k, bool $bought) {
        if ($k === 0) {
            return 0;
        }

        if (isset($this->cache[$day][$k][$bought])) {
            return $this->cache[$day][$k][$bought];
        }

        $price = $this->prices[$day];

        if ($price === null) {
            return 0;
        }

        if ($bought) {
            // cell
            $result = $price + $this->sub($day + 1, $k - 1, false);
        } else {
            // buy
            $result = $this->sub($day + 1, $k, true) - $price;
        }

        $skip = $this->sub($day + 1, $k, $bought);

        if ($result < $skip) {
            $result = $skip;
        }

        return $this->cache[$day][$k][$bought] = $result;
    }
}
