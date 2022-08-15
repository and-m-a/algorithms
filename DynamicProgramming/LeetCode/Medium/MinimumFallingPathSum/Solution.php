<?php

class Solution {
    
    private $matrix = [];
    private $cache = [];

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function minFallingPathSum($matrix) {
        
        $this->matrix = $matrix;
        
        $firstRow = $this->matrix[0];
        
        $min = null;
        
        foreach ($firstRow as $column => $price) {
            
            $case = $price + $this->sub(1, $column);
            
            if ($min === null || $min > $case) {
                $min = $case;
            }
        }
        
        return $min;
    }
    
    function sub(int $startRow, int $column) {
        
        if (isset($this->cache[$startRow][$column])) {
            return $this->cache[$startRow][$column];
        }
        
        if (!isset($this->matrix[$startRow][$column])) {
            return $this->cache[$startRow][$column] = 0;
        }
                
        $price = $this->matrix[$startRow][$column];
        $min = $price + $this->sub($startRow + 1, $column);
                
        if (isset($this->matrix[$startRow][$column - 1])) {
            
            $leftPrice = $this->matrix[$startRow][$column - 1];
            $left = $leftPrice + $this->sub($startRow + 1, $column - 1);

            if ($left < $min) {
                $min = $left;
            }
        }
        
        if (isset($this->matrix[$startRow][$column + 1])) {
            $rightPrice = $this->matrix[$startRow][$column + 1];
            $right = $rightPrice + $this->sub($startRow + 1, $column + 1);

            if ($right < $min) {
                $min = $right;
            }    
        }
        
        return $this->cache[$startRow][$column] = $min;
    }
}
