<?php

class Solution {
    
    private $cache = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n) {    
        if ($n === 0) {
            return 1;
        }
        
        if ($n === 1) {
            return 1;
        }
        
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        
        $result = 0;
        $left = $n - 1;
        $right = 0;
        
        for ($right = 0; $right < $n; $right++) {
            $left = $n - $right - 1;
            
            $result += $this->numTrees($left) * $this->numTrees($right);  
        }
        
        return $this->cache[$n] = $result;
    }
}
