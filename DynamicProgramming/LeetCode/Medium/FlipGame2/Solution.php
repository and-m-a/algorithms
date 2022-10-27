<?php

class Solution {

    /**
     * @param String $currentState
     * @return Boolean
     */
    function canWin($currentState) {
        
        if (isset($this->cache[$currentState])) {
            return $this->cache[$currentState];
        }
        
        $result = false;
        $plusesInARow = 0;
        $length = strlen($currentState);
        
        for ($i = 0; $i < $length; $i++) {
            
            $cur = $currentState[$i];
            
            if ($cur === '+') {
                $plusesInARow++;
                
                if ($plusesInARow === 2) {
                    $next = $currentState;
                    $next[$i] = '-';
                    $next[$i - 1] = '-';
                    
                    if (!$this->canWin($next)) {        
                        $result = true;
                        break;
                    }
                    
                    $plusesInARow--;
                }
            } else {
                $plusesInARow = 0;
            }
        }
        
        
        return $this->cache[$currentState] = $result;
    }
}
