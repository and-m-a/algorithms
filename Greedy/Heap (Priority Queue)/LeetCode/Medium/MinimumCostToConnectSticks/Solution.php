<?php

class Solution {

    /**
     * @param Integer[] $sticks
     * @return Integer
     */
    function connectSticks($sticks) {
        
        $heap = new SplMinHeap();

        foreach ($sticks as $stick) {
            $heap->insert($stick);
        }

        $result = 0;

        while ($heap->count() > 1) {
            $result += $newStick = $heap->extract() + $heap->extract();
            $heap->insert($newStick);
        }

        return $result;
    }
}
