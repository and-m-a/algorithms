<?php

class Solution {
    
    public const OPPS = [
        '1' => 0,
        '0' => 1
    ];
    
    public const PAIRS = [
        '1' => '10',
        '0' => '01'
    ];

    /**
     * @param String $s
     * @return Integer
     */
    function numberOfWays($s) {
        
        $cache = [];
        $length = strlen($s);
        
        $result = 0;
        
        for ($i = 0; $i < $length; $i++) {
            $current = $s[$i];
            $opp = self::OPPS[$current];
            
            if (isset($cache[$opp])) {
                $cache[$opp . $current] += $cache[$opp];
            }
            
            $pair = self::PAIRS[$current];
            
            if (isset($cache[$pair])) {
                $result += $cache[$pair];
            }
            
            $cache[$current] += 1;
        }
        
        return $result;
    }
}
