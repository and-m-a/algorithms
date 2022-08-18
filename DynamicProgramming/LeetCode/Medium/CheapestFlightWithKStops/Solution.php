<?php

class Solution {
    
    private $cache = [];
    private $flights = []; // @todo group by start from

    /**
     * @param Integer $n
     * @param Integer[][] $flights
     * @param Integer $src
     * @param Integer $dst
     * @param Integer $k
     * @return Integer
     */
    function findCheapestPrice($n, $flights, $src, $dst, $k) {
        
        foreach ($flights as $flight) {
            $this->flights[$flight[0]][] = [
                'dst' => $flight[1],
                'price' => $flight[2]
            ];
        }
        
        return $this->sub($src, $dst, $k);
    }
    
    function sub($src, $dst, $k) {
        
        if (isset($this->cache[$src][$dst][$k])) {
            return $this->cache[$src][$dst][$k];
        }
        
        if ($k < 0) {
            return $this->cache[$src][$dst][$k] = -1;
        }     
        
        $min = null;
        
        foreach ($this->flights[$src] as $flight) {
            
            $subDst = $flight['dst'];
            
            if ($subDst === $dst) {
                $case = $flight['price'];
            } else {
                $sub = $this->sub($subDst, $dst, $k - 1);
                    
                if ($sub === -1) {
                    continue;
                }
                
                $case = $flight['price'] + $sub;
            }                
            
            if ($min === null || $case < $min) {
                $min = $case;
            }
        }
        
        return $this->cache[$src][$dst][$k] = $min ?? -1;
    }
}
