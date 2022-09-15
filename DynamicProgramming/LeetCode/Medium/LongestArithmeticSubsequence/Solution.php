<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestArithSeqLength($nums) {
        
        $length = count($nums);
        $result = 0;

        $cache = [];
        
        foreach ($nums as $i => $current) {
            
            for ($j = $i + 1; $j < $length; $j++) {
                $next = $nums[$j];
                
                $diff = $next - $current;
                
                if (isset($cache[$diff][$i])) {
                    $cache[$diff][$j] = $cache[$diff][$i] + 1;
                } else {
                    $cache[$diff][$j] = 2; 
                }
                
                if ($cache[$diff][$j] > $result) {
                    $result = $cache[$diff][$j];
                }                              
            }            
        }
        
        return $result;
    }
}
