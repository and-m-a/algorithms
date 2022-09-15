<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function lenLongestFibSubseq($arr) {
        
        $length = count($arr);
        $cache = [];
        $result = 0;
        
        foreach ($arr as $i => $current) {
            
            for ($j = $i + 1; $j < $length; $j++) {
                
                $next = $arr[$j];
                $sum = $current + $next;
                
                if (isset($cache[$i][$next])) {
                    
                    
                    $cache[$j][$sum] = $cache[$i][tr$next] + 1;
                    
                    if ($cache[$j][$sum] > $result) {
                        $result = $cache[$j][$sum];
                    }
                    
                } else {
                    $cache[$j][$sum] = 2;
                }
            }            
        }
        
        return $result;
    }
}
