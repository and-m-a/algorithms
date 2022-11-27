<?php 

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function numFactoredBinaryTrees($arr) {

        $result = 0;

        foreach ($arr as $num) {
            $this->grouped[$num] = 1;
        }

        foreach ($arr as $num) {
            $result += 1;
            $result += $this->sub($num, $arr);
        }

        return $result % 1000000007;
    }

    function sub($root, $arr) {
        if (isset($this->cache[$root])) {
            return $this->cache[$root];
        }

        $result = 0;

        foreach ($arr as $num) {
            
            if ($root % $num === 0) {
                $factor = $root / $num;

                if (isset($this->grouped[$factor])) {
                    $result++;

                    $left = $this->sub($num, $arr);
                    $right = $this->sub($factor, $arr);

                    if ($left === 0) {
                        $result += $right;
                    } else if ($right === 0) {
                        $result += $left;
                    } else {
                        $result += $left * $right;
                        $result += $left;
                        $result += $right;
                    }
                }
            }
        }

        return $this->cache[$root] = $result;
    }
}
