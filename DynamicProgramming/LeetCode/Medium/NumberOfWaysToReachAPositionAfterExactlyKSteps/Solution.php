<?php

class Solution {
    
    private $endPos;

    /**
     * @param Integer $startPos
     * @param Integer $endPos
     * @param Integer $k
     * @return Integer
     */
    function numberOfWays($startPos, $endPos, $k) {
        
        $this->endPos = $endPos;
    
        return $this->sub($startPos, $k);
    }
    
    function sub(int $startPos, int $k) {
        
        if (isset($this->cache[$startPos][$k])) {            
            return $this->cache[$startPos][$k];
        }

        if ($k === 0) {
            return $startPos === $this->endPos ? 1 : 0;
        }
        
        $left = $this->sub($startPos - 1, $k - 1);
        $right = $this->sub($startPos + 1, $k - 1);
        
        $result = ($left + $right) % 1000000007;
        
        return $this->cache[$startPos][$k] = $result;
        
    }
}
