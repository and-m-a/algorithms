<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n) {
                
        if ($n === 1) {
            return 1;
        }
        
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        
        $factors = [2,3,5];
        
        $prev = $this->nthUglyNumber($n - 1);
        
        $min = $prev;
        $max = $prev * 2;
                
        $start = $n - 2;
        
        foreach ($factors as $factor) {
            for ($i = $start; $i > 0; $i--) {
            
                $new = $this->nthUglyNumber($i) * $factor;

                if ($new <= $min) {
                    break;
                }

                if ($new < $max) {
                    $max = $new;
                }
            }
            
            $start = $i;
        }
        
        return $this->cache[$n] = $max;
    }
}
