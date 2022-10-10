<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function divisorGame($n) {
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        
        $result = false;
        
        for ($x = 1; $x < $n; $x++) {
            
            if ($n % $x === 0) {
                                
                // This is the opponent move
                // if he can not win with this "x" I will choose this "x"
                if (!$this->divisorGame($n - $x)) {
                    $result = true;
                    break;
                }
            }
        }
        
        return $this->cache[$n] = $result;
    }
}
