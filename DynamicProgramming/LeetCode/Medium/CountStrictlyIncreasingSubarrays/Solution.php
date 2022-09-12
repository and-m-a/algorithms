<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countSubarrays($nums) {
        
        $result = 0;
        $length = 1;
        
        foreach ($nums as $i => $num) {
            
            $prev = $nums[$i - 1];
            
            if ($prev !== null && $num > $prev) {
                $length++;
            } else {
                $length = 1;
            }
            
            $result += 1;
            $result += $length - 1;
        }
        
        return $result;
    }
}
