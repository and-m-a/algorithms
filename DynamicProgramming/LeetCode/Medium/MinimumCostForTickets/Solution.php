<?php 

class Solution {

    private $cache = [];
    
    private $days;
    private $end;
    private $costs;
    
    /**
     * @param Integer[] $days
     * @param Integer[] $costs
     * @return Integer
     */
    function mincostTickets($days, $costs) {
        $this->days = $days;
        $this->end = count($days) - 1;
        $this->costs = $costs;
        
        return $this->sub(0, 0);
    }
    
    function sub(int $start, int $pass) {    
        if ($start > $this->end) {
            return 0;
        }
        
        if (isset($this->cache[$start][$pass])) {
            return $this->cache[$start][$pass];
        }
        
        $currentDay = $this->days[$start];
        
        if ($currentDay <= $pass) {
            $daysDiff = $currentDay - $this->days[$start - 1];
                        
            return $this->sub($start + 1, $pass);
        }
        
        // one day pass
        $result = $this->costs[0] + $this->sub($start + 1, 0);
        
        $oneWeek = $this->costs[1] + $this->sub($start + 1, $currentDay + 6);
        
        if ($oneWeek < $result) {
            $result = $oneWeek;
        }
        
        $oneMonth = $this->costs[2] + $this->sub($start + 1, $currentDay + 29);
        
        if ($oneMonth < $result) {
            $result = $oneMonth;
        }
        
        return $this->cache[$start][$pass] = $result;
    }
}
