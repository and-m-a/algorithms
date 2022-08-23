<?php

class Solution {
    
    private $end = 0;
    private $costs = [];
    
    private $cache = [];

    /**
     * @param Integer[][] $costs
     * @return Integer
     */
    function minCost($costs) {
        
        $this->costs = $costs;
        $this->end = count($costs) - 1;
        
        return $this->sub(0);
    }
    
    function sub(int $start, int $prevColor = null) {
        
        if ($start > $this->end) {
            return 0;
        }
        
        if (isset($this->cache[$start][$prevColor])) {
            return $this->cache[$start][$prevColor];
        }
        
        $min = null;
        
        $currentCosts = $this->costs[$start];
        
        foreach ($currentCosts as $color => $cost) {
            
            if ($color === $prevColor) {
                continue;
            }
            
            $s = $this->sub($start + 1, $color);
                        
            $case = $cost + $this->sub($start + 1, $color);
            
            if ($min === null || $min > $case) {
                $min = $case;
            }
        }
        
        return $this->cache[$start][$prevColor] = $min;
    }
}
