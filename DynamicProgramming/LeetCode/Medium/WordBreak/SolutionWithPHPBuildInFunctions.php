<?php

class Solution {
    
    private $cache = [];

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
                
        if (isset($this->cache[$s])) {            
            return $this->cache[$s];
        }
                
        foreach ($wordDict as $word) {
            
            $contains = strpos($s, $word) === 0;
            
            if ($contains) {
                
                $subStringStart = strlen($word);
                
                $subString = substr($s, $subStringStart);
                
                if ($subString) {
                    $subContains = $this->wordBreak($subString, $wordDict);
                
                    if ($subContains) {
                        return $this->cache[$s] = true;
                    }    
                } else {
                    return $this->cache[$s] = true;
                }
            }
            
        }    

        return $this->cache[$s] = false;
    }
}
