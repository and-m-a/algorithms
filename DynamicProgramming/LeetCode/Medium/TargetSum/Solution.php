<?php

class Solution {
    
    private $cache = [];
    private $nums = [];

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function findTargetSumWays($nums, $target) {
        
        $this->nums = $nums;
        
        return $this->subN(0, $target);
    }
    
    function subN(int $start, int $target) {
        
        if (!isset($this->nums[$start])) {
            return 0;
        }
        
        if (!isset($this->nums[$start + 1])) { // last element
            
            if (
                $this->nums[$start] === $target
                || $this->nums[$start] === $target * -1
            ) {
               return $this->nums[$start] === 0 ? 2 : 1; 
            }
            
            return 0;
        }
               
        if (isset($this->cache[$start][$target])) {
            return $this->cache[$start][$target];
        }
        
        $subTargetA = $target - $this->nums[$start];
        $subResultA = $this->subN($start + 1, $subTargetA);
        
        $subTargetB = $target + $this->nums[$start];
        $subResultB = $this->subN($start + 1, $subTargetB);
        
        return $this->cache[$start][$target] = $subResultA + $subResultB;
    }
}
