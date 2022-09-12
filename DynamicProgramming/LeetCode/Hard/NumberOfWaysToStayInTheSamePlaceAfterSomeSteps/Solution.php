<?php

class Solution {
    
    private $cache = [];
    private $end;

    /**
     * @param Integer $steps
     * @param Integer $arrLen
     * @return Integer
     */
    function numWays($steps, $arrLen) {
        $this->end = $arrLen - 1;
        
        return $this->sub(0, $steps);
    }
    
    function sub(int $current, int $steps) {
        
        if ($current < 0) {
            return 0;
        }
        
        if ($current > $this->end) {
            return 0;
        }
        
        if ($steps < 0) {
            return 0;
        }
        
        if ($current === 0 && $steps === 0) {
            return 1;
        }
        
        if (isset($this->cache[$current][$steps])) {
            return $this->cache[$current][$steps];
        }
        
        $left = $this->sub($current - 1, $steps - 1);
        $stay = $this->sub($current, $steps - 1);
        $right = $this->sub($current + 1, $steps - 1);
        
        $result = $left + $stay + $right;
        
        return $this->cache[$current][$steps] = $result % 1000000007;
    }
    
}
