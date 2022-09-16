<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray($nums) {
        
        $result = 0;
        
        $current = 0;
        $next = 0;
        
        $alreadyDeleted = false;        
        
        foreach ($nums as $num) {
            if ($num === 1) {
                
                if ($alreadyDeleted) {
                    $next++;
                } else {
                    $current++;
                }
                
                
            } else {
                if ($alreadyDeleted) {
                    $current = $next;
                    $next = 0;
                } else {
                    $alreadyDeleted = true;
                }
            }
            
            $sub = $current + $next;
            
            if (!$alreadyDeleted) {
                $sub -= 1;
            }
            
            if ($sub > $result) {
                $result = $sub;
            }
        }
        
        return $result;
    }
}
