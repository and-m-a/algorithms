<?php 

class Solution {

    private $target;

    /**
     * @param String $target
     * @return Integer
     */
    function minFlips($target) {
        $this->target = $target;

        return $this->minFlipsFrom(0, 0);
    }

    function minFlipsFrom(int $start, int $current) {
        $letter = $this->target[$start];

        if ($letter === '') {
            return 0;
        }

        if ($letter == $current) {
            return $this->minFlipsFrom($start + 1, $current);
        } else {
            return 1 + $this->minFlipsFrom($start + 1, !$current);
        }
    }
}
