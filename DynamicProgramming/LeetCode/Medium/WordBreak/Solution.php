<?php

class Solution {
    
    private $s = null;
    private $end = 0;
    private $cache = [];
    private $cCache = [];

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
        
        $this->s = $s;
        $this->end = strlen($s);
    
        return $this->sub(0, $wordDict);
    }
    
    function sub($start, $wordDict) {
        
        if (isset($this->cache[$start])) {            
            return $this->cache[$start];
        }
        
        if ($this->s[$start] === '') {
            return $this->cache[$start] = true;
        }
                
        foreach ($wordDict as $word) {
        
            $contains = true;

            $wI = 0;

            for ($i = $start; $i < $this->end; $i++) {

                if ($word[$wI] === '') {
                    break;
                }

                if ($this->s[$i] !== $word[$wI]) {
                    $contains = false;
                    break;
                }

                $wI++;
                $newStart = $i + 1;
            }

            if ($word[$wI] !== '') {
                $contains = false;
            }                               
 
            if ($contains) {
                $subContains = $this->sub($newStart, $wordDict);

                if ($subContains) {
                    return $this->cache[$start] = true;
                }
            }
        }

        return $this->cache[$start] = false;   
    }
}
