<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n) {
        
        $min = null;
        $root = (int) floor(sqrt($n));
        
        if ($root * $root === $n) {
            return 1;
        }
        
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        
        for ($i = $root; $i > 0; $i--) {

            $maxPerfectSquare = $i * $i;
            $new = 1 + $this->numSquares($n - $maxPerfectSquare);
            
            if ($min === null || $new < $min) {
                $min = $new;
            }
            
            if ($min === 2) {
                break;
            }
        }
        
        return $this->cache[$n] = $min;
    }
}
