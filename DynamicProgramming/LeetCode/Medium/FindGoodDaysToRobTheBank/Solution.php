<?php

class Solution {

    /**
     * @param Integer[] $security
     * @param Integer $time
     * @return Integer[]
     */
    function goodDaysToRobBank($security, $time) {
        
        if ($time === 0) {
            return array_keys($security);
        }
        
        $length = count($security);
        $cache = [];
     
        $result = [];
        $candidates = [];
        $nonIncreasing = 0;
        $nonDecreasing = 0;
        
        for ($i = 1; $i < $length; $i++) {
            
            $current = $security[$i];
            $prev = $security[$i - 1];
            
            if ($current < $prev) {
                $nonIncreasing++;
                $nonDecreasing = 0;
            } else if ($current > $prev) {
                $nonDecreasing++;
                $nonIncreasing = 0;
            } else {
                $nonIncreasing++;
                $nonDecreasing++;
            }
                        
            if ($nonIncreasing >= $time) {                    
                $candidates[$i] = $i;
            }
            
            if ($nonDecreasing >= $time) {    
                if (isset($candidates[$i - $time])) {
                    $result[] = $candidates[$i - $time];
                }
            }
        }
        
        return $result;
    }
}
