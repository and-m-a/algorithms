<?php

class Solution {
    
    private $k;
    private $cache = [];

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function numWays($n, $k) {
        $this->k = $k;
        
        $node = $this->sub($n - 1, false);
        
        return $node * $this->k;
    }
    
    function sub(int $n, bool $used) {
        
        if ($n === 0) {
            return 1;
        }
        
        if (isset($this->cache[$n][$used])) {
            return $this->cache[$n][$used];
        }
        
        if ($n === 1) {
            $result = $used ? $this->k - 1 : $this->k;
            
            return $this->cache[$n][$used] = $result;
        }
        
        $result = ($this->k - 1) * $this->sub($n - 1, false);
        
        if (!$used) {
            $result += $this->sub($n - 1, true);
        }
        
        return $this->cache[$n][$used] = $result;
    }
}
