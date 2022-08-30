<?php

class Solution {

    private $cache = [];
    
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $c = count($nums);
        
        return $this->robC($nums, $c - 1);
    }
    
    
    function robC($nums, $l) {
        if ($l === 0) {
            return $nums[0];
        }
        
        if ($l === 1) {
            return $this->cache[$l] = $this->max($nums[0], $nums[1]);
        }
        
        if (isset($this->cache[$l])) {
            return $this->cache[$l];
        }
        
        return $this->cache[$l] = $this->max(
            $this->robC($nums, $l-2) + $nums[$l],
            $this->robC($nums, $l-1)
        );
    }
    
    function max($a, $b) {
       return $a > $b ? $a : $b; 
    }
}
