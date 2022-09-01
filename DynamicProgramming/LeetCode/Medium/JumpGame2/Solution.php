<?php

class Solution {
    
    private $cache = [];
    private $nums;
    private $end;

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums) {
        $this->nums = $nums;
        $this->end = count($nums) - 1;
        
        return $this->sub(0);
    }
    
    function sub(int $start) {
        if ($start >= $this->end) {
            return 0;
        }

        if (isset($this->cache[$start])) {
            return $this->cache[$start];
        }

        $max = $this->nums[$start];
        
        if ($max === 0) {
            return -1;
        }

        $min = -1;
        
        for ($i = 1; $i <= $max; $i++) {            
            $case = $this->sub($start + $i);
            
            if ($case === -1) {
                continue;
            }
            
            $case += 1;
            
            if ($min === -1 || $case < $min) {
                $min = $case;
            }
        }
        
        return $this->cache[$start] = $min;
    }
}
