<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindromeSubseq($s) {
        
        $this->s = $s;
        
        return $this->sub(0, strlen($s) - 1);
    }
    
    function sub(int $sI, int $eI) {
        
        if (isset($this->cache[$sI][$eI])) {
            return $this->cache[$sI][$eI];
        }
        
        if ($sI > $eI) {
            return 0;
        }
        
        if ($sI === $eI) {
            return 1;
        }
        
        $start = $this->s[$sI];
        $end = $this->s[$eI];
        
        if ($start === $end) {
            $result = 2 + $this->sub($sI + 1, $eI - 1);
        } else {
            $result = 0;
        }
        
        $left = $this->sub($sI + 1, $eI);
        
        if ($left > $result) {
            $result = $left;
        }
        
        $right = $this->sub($sI, $eI - 1);
        
        if ($right > $result) {
            $result = $right;
        }
        
        return $this->cache[$sI][$eI] = $result;
    }
}
