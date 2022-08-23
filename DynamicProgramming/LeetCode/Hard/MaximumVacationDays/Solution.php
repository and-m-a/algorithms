<?php

class Solution {
    
    private $flights = []; // [i][j] i: from, j: to
    private $days = []; // [i][j] i: city, j: week
    private $cache = [];

    /**
     * @param Integer[][] $flights
     * @param Integer[][] $days
     * @return Integer
     */
    function maxVacationDays($flights, $days) {
        $this->flights = $flights;
        $this->days = $days;
        
        return $this->sub(0, 0);
    }
    
    function sub($currentCity, $currentWeek) {
        
        if (isset($this->cache[$currentCity][$currentWeek])) {
            return $this->cache[$currentCity][$currentWeek];
        }
        
        if (!isset($this->days[$currentWeek][$currentCity])) {
            return 0;
        }
        
        $max = null;
        
        foreach ($this->flights[$currentCity] as $dst => $availability) {
            
            if ($currentCity === $dst || $availability === 1) {
                $days = $this->days[$dst][$currentWeek];  
                
                $sub = $this->sub($dst, $currentWeek + 1);
                
                $case = $days + $sub;
                
                if ($max === null || $case > $max) {
                    $max = $case;
                }
            }
            
        }
        
        return $this->cache[$currentCity][$currentWeek] = $max;
    }
}
