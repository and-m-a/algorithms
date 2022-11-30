<?php 

class Solution {
    
    private $nums = [];
    private $multipliers = [];
    private $m = 0;

    /**
     * @param Integer[] $nums
     * @param Integer[] $multipliers
     * @return Integer
     */
    function maximumScore($nums, $multipliers) {
        
        $this->nums = $nums;
        $this->multipliers = $multipliers;
        $this->m = count($multipliers);
        
        return $this->sub(0, count($nums) - 1, 0);
    }
    
    function sub(int $start, int $end, int $operation) {
        
        if ($operation === $this->m) {
            return 0;
        }
        
        if (isset($this->cache[$start][$end][$operation])) {
            return $this->cache[$start][$end][$operation];
        }
        
        $first = $this->nums[$start];
        $last = $this->nums[$end];
        $multiplier = $this->multipliers[$operation];
        
        $chooseFirst = $first * $multiplier + $this->sub($start + 1, $end, $operation + 1);
        $chooseLast = $last * $multiplier + $this->sub($start, $end - 1, $operation + 1);
        
        $result = $chooseFirst > $chooseLast ? $chooseFirst : $chooseLast;
        
        return $this->cache[$start][$end][$operation] = $result;
    }
}
