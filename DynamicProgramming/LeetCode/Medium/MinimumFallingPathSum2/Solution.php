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
    
    function sub(int $startRow, int $except) {
        
        if (isset($this->cache[$startRow][$except])) {
            return $this->cache[$startRow][$except];
        }
        
        if (!isset($this->matrix[$startRow][$except])) {
            return $this->cache[$startRow][$except] = 0;
        }
        
        $min = null;
        
        foreach ($this->matrix[$startRow] as $column => $price) {
            if ($column === $except) {
                continue;
            }
            
            $price = $this->matrix[$startRow][$column];
            $case = $price + $this->sub($startRow + 1, $column);
   
            if ($min === null || $case < $min) {                
                $min = $case;
            }
        }
        
        return $this->cache[$startRow][$except] = $min;
    }
}
