<?php

class Solution {

    /**
     * @param Integer[] $team
     * @param Integer $dist
     * @return Integer
     */
    function catchMaximumAmountofPeople($team, $dist) {
        
        $result = 0;
        $zeroQueue = [];
        $onesQueue = [];

        foreach ($team as $i => $member) {

            if ($member === 0) {

                $caught = false;

                while ($onesQueue) {
                    $one = array_shift($onesQueue);

                    if ($i <= $one + $dist) {
                        $result++;
                        $caught = true;
                        break;
                    }
                }

                if (!$caught) {
                    $zeroQueue[] = $i;
                }
            } else {

                $caught = false;

                while ($zeroQueue) {
                    $zero = array_shift($zeroQueue);

                    if ($zero >= $i - $dist) {
                        $result++;
                        $caught = true;
                        break;
                    }
                }

                if (!$caught) {
                    $onesQueue[] = $i;
                }
            }
        }

        return $result;
    }
}
