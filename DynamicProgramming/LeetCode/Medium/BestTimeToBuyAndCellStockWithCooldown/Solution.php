<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $this->prices = $prices;

        return $this->sub(0, false);
    }
    
    function sub(int $start, bool $cell) : int 
    {
        if (!isset($this->prices[$start])) {
            return 0;
        }
        
        if (isset($this->cache[$start][$cell])) {
            return $this->cache[$start][$cell];
        }
        
        if ($cell === false) {
            
            $skip = $this->sub($start + 1, false);
            
            $buy = $this->sub($start + 1, true) - $this->prices[$start];
                        
            $result = $buy > $skip ? $buy : $skip;

        } else {
            
            $skip = $this->sub($start + 1, true);
            
            $cell = $this->prices[$start] + $this->sub($start + 2, false);
            
            $result = $cell > $skip ? $cell : $skip;          
        }
        
        return $this->cache[$start][$cell] = $result;
    }
}
