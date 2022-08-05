<?php

class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix) {

        $cache = [];
        $max = 0;
        
    
        foreach ($matrix as $r => $row) {
            $newMax = 0;
            $intersection = 0;
            
            foreach ($row as $c => $column) {
                
                if ($column === "1") {
                    
                    $newMax = 1;
                    
                    if ($matrix[$r - 1][$c] === "1") {
                        $intersection++;
                        
                        if ($intersection >= 2) {
                            $cache[$r][$c][$intersection] = 2; // height
                            
                            if (2 > $max) {
                                $max = 2;
                            }
                        }
                        
                        foreach ($cache[$r - 1][$c] ?? [] as $prevIntersection => $height) {
                            
                            $minIntersection = $prevIntersection < $intersection ? $prevIntersection : $intersection;
                            
                            $cache[$r][$c][$minIntersection] = $height + 1;
                                
                            $newMax = $minIntersection < $height + 1 ? $minIntersection : $height + 1;
                                
                            if ($newMax > $max) {
                                $max = $newMax;
                            }
                        }
                    } else {
                        $intersection = 0;
                    }
                                       
                    if ($newMax > $max) {
                        $max = $newMax;
                    }
                } else {
                    $intersection = 0;
                }
            }
        }
        
        return $max * $max;
    }
}
