<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave($s1, $s2, $s3) {
        
        $this->s1 = $s1;
        $this->s2 = $s2;
        $this->s3 = $s3;        

        return $this->sub(0, 0, 0);
    }

    function sub(int $i1, int $i2, int $i3) {

        $l1 = $this->s1[$i1];
        $l2 = $this->s2[$i2];
        $l3 = $this->s3[$i3];

        if ($l3 === "") {
            return $l1 === "" && $l2 === "" ? true : false;
        }

        if (isset($this->cache[$i1][$i2])) {
            return $this->cache[$i1][$i2];
        }

        if ($l1 && $l3 === $l1) {
            $sub = $this->sub($i1 + 1, $i2, $i3 + 1);

            if ($sub) {
                return $this->cache[$i1][$i2] = true;
            }
        }

        if ($l2 && $l3 === $l2) {
            $sub = $this->sub($i1, $i2 + 1, $i3 + 1);

            if ($sub) {
                return $this->cache[$i1][$i2] = true;
            }
        }

        return $this->cache[$i1][$i2] = false;
    }
}
