class Solution {
    
    private $prices = [];
    private $cache = [];

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        
        $this->prices = $prices;
        
        return $this->act(0, false);
    }
    
    function act(int $start, bool $cache) {
        
        $current = $this->prices[$start];
        
        if (!isset($this->prices[$start + 1])) {               
            return $cache ? $current : 0;
        }
        
        if (isset($this->cache[$start][$cache])) {
            return $this->cache[$start][$cache];
        }
                        
        if ($cache) {     
            
             // Cell cache: if we have cache (already bougth stock) we can cell it buy new price, or we can just skip (skip case is handled at the end)
            $result = $this->act($start, false) + $current;
        } else {
            
            // Buy current: if we do not have cache we can buy current and go ahead, or skip (skip case is handled at the end)
            $result = $this->act($start + 1, true) - $current; 
        }
        
        $skip = $this->act($start + 1, $cache); // Do nothing, just skip
        
        if ($skip > $result) {
            $result = $skip;
        }
        
        return $this->cache[$start][$cache] = $result;
    }
}
