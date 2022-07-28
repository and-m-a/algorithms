<?php

// Optimal solution: speed - O(n)
class Solution {

    private $cache = [];
    
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {  
        $maxProduct = null;
        
        $maxPositiveProduct = 1;
        $maxNegativeProduct = 1;
        
        foreach ($nums as $num) {
            
            if ($num > 0) {
                
                $maxPositiveProduct *= $num;
                $maxNegativeProduct *= $num;
                
                $subResult = $maxPositiveProduct;
            }
            
            if ($num === 0) {
                $subResult = 0;
                
                $maxPositiveProduct = 1;
                $maxNegativeProduct = 1;
            }
            
            if ($num < 0) {
                $maxNegativeProduct *= $num;
                
                if ($maxNegativeProduct > 0) {
                    // If max negative product is > 0 it is now max positive product and we should swap them
                    $swap = $maxPositiveProduct;
                    $maxPositiveProduct = $maxNegativeProduct;
                    $maxNegativeProduct = $swap * $num;
                    
                    $subResult = $maxPositiveProduct;
                } else {
                    $maxPositiveProduct = 1;
                    $subResult = $maxNegativeProduct;
                }                
            }
            
            
            if ($maxProduct === null || $subResult > $maxProduct) {
                $maxProduct = $subResult;
            }
        }
        
        return $maxProduct;
    }
}
