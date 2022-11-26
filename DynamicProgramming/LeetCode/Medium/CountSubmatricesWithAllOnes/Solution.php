<?php 

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSubmat($mat) {
        
        $cache = [];
        $rowCache = [];
        $columnCache = [];
        $result = 0;
        
        foreach ($mat as $rI => $row) {
            foreach ($row as $cI => $column) {
                
                if ($column == 1) {
                    $result += 1;

                    $length = $rowCache[$rI][$cI - 1] + 1;
                    $rowCache[$rI][$cI] = $length;
                    $result += $length - 1;

                    $height = $columnCache[$rI - 1][$cI] + 1;
                    $columnCache[$rI][$cI] = $height;
                    $result += $height - 1;

                    for ($i = 1; $i <= $length; $i++) {
                        $upperRow = $columnCache[$rI][$cI - $i];
                        
                        if ($upperRow === null) {
                            break;
                        }

                        if ($height > $upperRow) {
                            $height = $upperRow;
                        }

                        $result += $height - 1;
                    }

                    // for ($i = 1; $i <= $height; $i++) {
                    //     $upperRow = $rowCache[$rI - $i][$cI];
                        
                    //     if ($upperRow === null) {
                    //         break;
                    //     }

                    //     if ($length > $upperRow) {
                    //         $length = $upperRow;
                    //     }

                    //     $result += $length - 1;
                    // }
                }
            }
        }
        
        return $result;
    }
}
