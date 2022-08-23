<?php

class Solution {

    private $cache = [];
    
    private $houses = [];
    private $cost = [];
    private $housesCount = 0;
    
    /**
     * @param Integer[] $houses
     * @param Integer[][] $cost
     * @param Integer $m
     * @param Integer $n
     * @param Integer $target
     * @return Integer
     */
    function minCost($houses, $cost, $m, $n, $target) {
        
        $this->cost = $cost;
        $this->houses = $houses;
        $this->housesCount = $m;
        $this->target = $target;
        
        return $this->sub(0, $target);
    }
    
    function sub(int $start, int $target, int $prevColor = null) {
     
        if ($target < 0) {
            return -1;
        }
        
        if ($start === $this->housesCount) {
            return $target === 0 ? 0 : -1;
        }
        
        if (isset($this->cache[$start][$target][$prevColor])) {
            return $this->cache[$start][$target][$prevColor];
        }
        
        $min = null;
        
        $currentHouseColor = $this->houses[$start];
        
        // If house is not painted yet
        if ($currentHouseColor === 0) {
            
            $currentHouseCosts = $this->cost[$start];
            
            foreach ($currentHouseCosts as $cI => $costForColor) {
                
                $color = $cI + 1;
                
                if ($color !== $prevColor) {
                    $nextTarget = $target - 1;
                } else {
                    $nextTarget = $target;
                }
                
                $sub = $this->sub($start + 1, $nextTarget, $color);
                
                if ($sub === -1) {
                    continue;
                }
                            
                $case = $costForColor + $sub;
                
                if ($min === null || $min > $case) {
                    $min = $case;
                }
            }
        } else {
            
            if ($currentHouseColor !== $prevColor) {
                $nextTarget = $target - 1;
            } else {
                $nextTarget = $target;
            }
            
            $min = $this->sub($start + 1, $nextTarget, $currentHouseColor);
        }
        
        return $this->cache[$start][$target][$prevColor] = $min ?? -1;
    }
}
