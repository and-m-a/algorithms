<?php

// This Problem can be optimised to O (N + M) and maybe more, but I don't have time to do it yet

class Solution {

    /**
     * @param String $firstString
     * @param String $secondString
     * @return Integer
     */
    function countQuadruples($firstString, $secondString) {
        
        $cache = [];

        $fLength = strlen($firstString);

        for ($i = 0; $i < $fLength; $i++) {

            $letter = $firstString[$i];

            if (!isset($cache[$letter]['j'])) {
                $cache[$letter]['j'] = $i;
            }
        }

        $sLength = strlen($secondString);

        for ($j = 0; $j < $sLength; $j++) {
            
            $letter = $secondString[$j];

            $cache[$letter]['a'] = $j;
        }

        $result = 0;
        $minDiff = PHP_INT_MAX;

        foreach ($cache as $letter => $data) {
            if (!isset($data['j']) || !isset($data['a'])) {
                continue;
            }

            $diff = $data['j'] - $data['a'];

            if ($minDiff > $diff) {
                $minDiff = $diff;
                $result = 1;
            } elseif ($minDiff === $diff) {
                $result++;
            }
        }

        return $result;
    }
}
