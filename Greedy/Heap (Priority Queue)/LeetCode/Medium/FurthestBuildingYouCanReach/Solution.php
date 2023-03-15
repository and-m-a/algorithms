<?php

class Solution {

    /**
     * @param Integer[] $heights
     * @param Integer $bricks
     * @param Integer $ladders
     * @return Integer
     */
    function furthestBuilding($heights, $bricks, $ladders) {
        
        $diffHeap = new SplMaxHeap();
        $last = count($heights) - 1;
        $i = 0;

        while ($bricks > 0 || $ladders > 0) {
            $currentDiff = $heights[$i + 1] - $heights[$i];

            if ($i === $last) {
                break;
            }

            if ($currentDiff <= 0) {
                $i++;
                continue;
            }

            if ($bricks >= $currentDiff) {
                $bricks -= $currentDiff;
                $diffHeap->insert($currentDiff);
                $i++;

            } else if ($ladders > 0) {

                $i++;
                $ladders--;

                $maxDiff = $diffHeap->current();

                if ($currentDiff < $maxDiff) {
                    $bricks += $maxDiff - $currentDiff;
                    $diffHeap->extract();
                    $diffHeap->insert($currentDiff);
                }
            } else {
                break;
            }
        }

        if ($i < $last) {
            while ($i < $last && $heights[$i + 1] <= $heights[$i]) {
                $i++;
            }
        }
        

        return $i;
    }
}
