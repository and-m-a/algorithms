<?php

class Solution {

    private $cache = [];
    private $nums = [];
    private $length;

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function waysToMakeFair($nums) {

        $this->nums = $nums;
        $this->length = count($nums);
        
        $result = 0;

        $all = $this->getSum(0);

        foreach($nums as $i => $num) {

            $next = $this->getSum($i + 1);

            $prevOdd = $all['odd'] - $next['odd'];
            $prevEven = $all['even'] - $next['even'];

            $isEven = $i % 2 === 0;

            if ($isEven) {
                $even = $prevEven - $num + $next['odd'];
                $odd = $prevOdd + $next['even'];
            } else {
                $even = $prevEven + $next['odd'];
                $odd = $prevOdd - $num + $next['even'];
            }

            if ($even === $odd) {
                $result++;
            }
        }

        return $result;
    }

    function getSum(int $i) {
        if ($i === $this->length) {
            return [
                'even' => 0,
                'odd' => 0
            ];
        }

        if (isset($this->cache[$i])) {
            return $this->cache[$i];
        }

        $next = $this->getSum($i + 1);
        $isEven = $i % 2 === 0;
        $num = $this->nums[$i];
        
        if ($isEven) {
            $even = $num + $next['even'];
            $odd = $next['odd'];
        } else {
            $even = $next['even'];
            $odd = $num + $next['odd'];
        }

        $result = [
            'even' => $even,
            'odd' => $odd
        ];

        return $this->cache[$i] = $result;
    }
}
