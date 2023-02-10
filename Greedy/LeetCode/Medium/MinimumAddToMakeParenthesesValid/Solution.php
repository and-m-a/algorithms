<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minAddToMakeValid($s) {
        $result = 0;
        $opened = 0;
        $closed = 0;
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $cur = $s[$i];

            if ($cur === '(') {
                $opened++;
            } else {
                if ($opened > $closed) {
                    $closed++;
                } else {
                    $result++;
                }
            }
        }

        $notClosed = $opened - $closed;

        return $result + $notClosed;
    }
}
