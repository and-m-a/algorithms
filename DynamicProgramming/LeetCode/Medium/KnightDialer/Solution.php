<?php

class Solution {
    
    public const MOVES = [
        0 => [4, 6],
        1 => [6, 8],
        2 => [7, 9],
        3 => [4, 8],
        4 => [0, 3, 9],
        5 => [],
        6 => [0, 1, 7],
        7 => [2, 6],
        8 => [1, 3],
        9 => [4, 2]
    ];
    

    /**
     * @param Integer $n
     * @return Integer
     */
    function knightDialer($n) {
        return $this->sub($n, null);
    }
    
    function sub(int $n, ?int $prev, array $moves = null) {
        if ($n === 0) {
            return 1;
        }
        
        if (isset($this->cache[$n][$prev])) {
            return $this->cache[$n][$prev];
        }
        
        $moves = self::MOVES[$prev] ?? [0,1,2,3,4,5,6,7,8,9];
        
        $result = 0;
        
        foreach ($moves as $move) {
            $result += $this->sub($n - 1, $move);
        }
        
        return $this->cache[$n][$prev] = $result % 1000000007;
    }
}
