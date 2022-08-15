<? php
  
class Solution {
    
    private $cache = [];
    private $avgCache = [];
    private $nums = [];
    private $end = 0;

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    function largestSumOfAverages($nums, $k) {
        
        $this->nums = $nums;
        $this->end = count($nums);
        
        return $this->sub(0, $k);
    }
    
    function sub($start, $k) {
        
        if (isset($this->cache[$start][$k])) {
            return $this->cache[$start][$k];
        }
        
        if ($k === 1) {            
            return $this->avg($start, $this->end - 1);
        }
        
        $max = null;
        
        for ($i = $start; $i < $this->end; $i++) {
            
            $initial = $this->avg($start, $i);
            
            if ($i < $this->end - 1) {
                $sub = $this->sub($i + 1, $k - 1);
            } else {
                $sub = 0;
            }
                        
            $case = $initial + $sub;
                        
            if ($max === null || $max < $case) {
                $max = $case;
            }
        }
        
        return $this->cache[$start][$k] = $max;
        
    }
    
    function avg($start, $end) {
        if (isset($this->avgCache[$start][$end])) {
            return $this->avgCache[$start][$end];
        }
        
        $count = $end - $start + 1;
        
        $sum = array_sum(
            array_slice($this->nums, $start, $count)
        );
        
        $avg = $sum / $count;
        
        return $this->avgCache[$start][$end] = $avg;
    }
}
