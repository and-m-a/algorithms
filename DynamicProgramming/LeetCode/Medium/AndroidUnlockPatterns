<?php

class Solution {
    
    public const AVAILABLE_MOVES = [
            1 => [
                2 => true,
                3 => 2,
                4 => true,
                5 => true,
                6 => true,
                7 => 4,
                8 => true,
                9 => 5
            ],
            2 => [
                1 => true,
                3 => true,
                4 => true,
                5 => true,
                6 => true,
                7 => true,
                8 => 5,
                9 => true
            ],
            3 => [
                1 => 2,
                2 => true,
                4 => true,
                5 => true,
                6 => true,
                7 => 5,
                8 => true,
                9 => 6
            ],
            4 => [
                1 => true,
                2 => true,
                3 => true,
                5 => true,
                6 => 5,
                7 => true,
                8 => true,
                9 => true
            ],
            5 => [
                1 => true,
                2 => true,
                3 => true,
                4 => true,
                6 => true,
                7 => true,
                8 => true,
                9 => true
            ],
            6 => [
                1 => true,
                2 => true,
                3 => true,
                4 => 5,
                5 => true,
                7 => true,
                8 => true,
                9 => true
            ],
            7 => [
                1 => 4,
                2 => true,
                3 => 5,
                4 => true,
                5 => true,
                6 => true,
                8 => true,
                9 => 8
            ],
            8 => [
                1 => true,
                2 => 5,
                3 => true,
                4 => true,
                5 => true,
                6 => true,
                7 => true,
                9 => true
            ],
            9 => [
                1 => 5,
                2 => true,
                3 => 6,
                4 => true,
                5 => true,
                6 => true,
                7 => 8,
                8 => true
            ]
        ];

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function numberOfPatterns($m, $n) {
        $result = 0;
        
        for ($i = 1; $i < 10; $i++) {
            for ($k = $m; $k <= $n; $k++) {
                $result += ($this->sub($k, $i, [$i => true]));
            }    
        }
        
        return $result;
    }
    
    function sub(int $k, int $current, array $path) {
                
        if ($k === 1) {
            return 1;
        }
                
//         If it is dynamic programming, how memoization works here?
//         Can we assume that memoization is the path argument which shows which dot's we have already selected
//         $key = json_encode($path);
//         if (isset($this->cache[$k][$current][$key])) {
//             var_dump(111);
//             return $this->cache[$k][$current][$key];
//         }
//         
        
        $result = 0;
        
        $nextMoves = self::AVAILABLE_MOVES[$current];
        
        foreach($nextMoves as $move => $value) {
           
            if (isset($path[$move])) {
                continue;
            }
            
            if ($value === true || isset($path[$value])) {
                $newPath = $path;
                $newPath[$move] = true;

                $result += $this->sub($k - 1, $move, $newPath);    
            }
        }
        
        return $result;
    } 
}
