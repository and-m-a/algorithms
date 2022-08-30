<?php

class Solution {
        
    private $n;
    private $cache = [];

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $this->n = $n;
        
        return $this->sub(["("], 1, 0);
    }
    
    function sub($data, $opened, $closed) {     
        if ($closed === $this->n) {
            return $data;
        }
        
        if ($opened > $this->n) {
            return $data;
        }
        
        if ($opened < $this->n) {
            
            $openData = array_map(function ($s) {
                return "$s(";
            }, $data);   

            $a = $this->sub($openData, $opened + 1, $closed);
        } else {
            $a = [];
        }
                    
        if ($opened > $closed) {
            $closeData = array_map(function ($s) {
                return "$s)";
            }, $data);   
            
            $b = $this->sub($closeData, $opened, $closed + 1);
        } else {
            $b = [];
        }
        
        return array_merge($a, $b);
    }
}
