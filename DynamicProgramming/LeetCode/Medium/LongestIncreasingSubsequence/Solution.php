<?php

class Solution {
    
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {
        
        $result = 0;
        $cache = [];
        
        foreach ($nums as $num) {            
            $prev = 0;
            
            foreach ($cache as $max => $count) {
                if ($num > $max && $count > $prev) {
                    $prev = $count;
                }
            }
            
            $current = 1 + $prev;
            $cache[$num] = $current;
            
            if ($current > $result) {
                $result = 1 + $prev;
            }            
        }
        
        return $result;
    }
}
