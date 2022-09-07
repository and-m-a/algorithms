<?php

class Solution {
    
    private $stones = [];
    private $end = 0;

    /**
     * @param Integer[] $stones
     * @return Boolean
     */
    function canCross($stones) {        
        foreach ($stones as $stone) {
            $this->stones[$stone] = true;
            $this->end = $stone;
        }
        
        return $this->sub(1, 1);
    }
    
    function sub(int $position, int $lastJump) {
                    
        if (!isset($this->stones[$position])) {
            return false;
        }
        
        if ($position === $this->end) {
            return true;
        }
        
        if (isset($this->cache[$position][$lastJump])) {
            return $this->cache[$position][$lastJump];
        }
        
        $plus = $this->sub($position + $lastJump + 1, $lastJump + 1);
        
        if ($plus) {
            $result = $plus;
        } else {
            
            $equal = $this->sub($position + $lastJump, $lastJump);
            
            if ($equal) {
                $result = $equal;
            } else {
                // minus
                if ($lastJump !== 1) {
                    $result = $this->sub($position + $lastJump - 1, $lastJump - 1);                    
                } else {
                    $result = false;
                }
            }
        }
        
        return $this->cache[$position][$lastJump] = $result;
    }
}
