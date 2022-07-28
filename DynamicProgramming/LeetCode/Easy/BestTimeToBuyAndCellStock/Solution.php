<?php
  
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = $prices[0];
        $profit = 0;
        
        for($i = 1; $i < count($prices); $i++) {
            $cur = $prices[$i];
            
            if ($cur < $min) {
                $min = $cur;
            }
            
            $newProfit = $cur - $min;
            
            if ($newProfit > $profit) {
                $profit = $newProfit;    
            }
        }
        
        return $profit;
    }
} 
