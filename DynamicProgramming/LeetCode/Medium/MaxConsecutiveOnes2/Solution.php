<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums) {
                
        $result = 0;
        
        $current = 0;
        $next = 0;
        
        $alreadyFlipped = false;        
        
        foreach ($nums as $num) {
            if ($num === 1) {
                
                if ($alreadyFlipped) {
                    $next++;
                } else {
                    $current++;
                }
                
            } else {
                if ($alreadyFlipped) {
                    $current = $next;
                    $next = 0;
                } else {
                    $alreadyFlipped = true;
                }
                
                $current++;
            }
            
            $sub = $current + $next;
            
            if ($sub > $result) {
                $result = $sub;
            }
        }
        
        return $result;
    }
}
