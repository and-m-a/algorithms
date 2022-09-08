<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countCornerRectangles($grid) {
        
        $corner = []; // [height][length] 
        $side = []; // [length][height]
        
        $result = 0;
        
        foreach ($grid as $height => $row) {
            foreach ($row as $length => $column) {
                
                // Add corner
                if ($column === 1) {
                    if (isset($side[$length])) {
                        foreach ($side[$length] as $startHeight => $cases) {
                            
                            foreach ($cases as $startLength) {
                                
                                if (isset($corner[$height][$startLength])) {
                                    $result++;
                                }
                            }
                        }
                    }

                    // Add side
                    if (isset($corner[$height])) {
                        foreach ($corner[$height] as $cL => $cColumn) {
                            
                            $side[$length][$height][] = $cL;
                        }
                    }
                    
                    $corner[$height][$length] = 1;                    
                }
            }
        }
        
        return $result;
    }
}
