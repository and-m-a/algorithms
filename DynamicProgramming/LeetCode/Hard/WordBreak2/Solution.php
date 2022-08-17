<?php

class Solution {
    
    private $s = '';
    private $end = 0;
    private $wordDict = [];
    private $cache = [];

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return String[]
     */
    function wordBreak($s, $wordDict) {
        
        $this->s = $s;
        $this->end = strlen($s);
        $this->wordDict = $wordDict;
        
        return $this->sub(0);
    }
    
    function sub($start) {
        
        if (isset($this->cache[$start])) {            
            return $this->cache[$start];
        }
        
        $result = [];
        
        foreach ($this->wordDict as $word) {
            
            $match = true;
            $wI = 0;
            $newStart = $start;
            
            for ($i = $start; $i < $this->end; $i++) {
                
                if ($word[$wI] === '') {
                    break;
                }
                
                if ($this->s[$i] !== $word[$wI]) {
                    $match = false;
                    break;
                }
                
                $wI++;
                $newStart = $i + 1;
            }
            
            if ($word[$wI] !== '') {
                $match = false;
            }
            
            if ($match) {
                
                if ($newStart >= $this->end) {
                    $result[] = $word;
                } else {
                    $sub = $this->sub($newStart);

                
                    foreach ($sub as $sentence) {
                        $result[] = $word . " " . $sentence;
                    }    
                }
            }
        }
        
        return $this->cache[$start] = $result;
    }
}
