<?php

class Solution {

    private $nums = [];
    private $last = 0;
    private $cache = [];

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function evenProduct($nums) {
        $this->nums = $nums;
        $this->last = count($nums) - 1;

        $sub = $this->sub(0);

        return $sub['result'];
    }

    function sub(int $i) {
        $num = $this->nums[$i];
        $isEven = $num % 2 === 0;

        if ($i === $this->last) {
            
            if ($isEven) {
                return [
                    'odd' => 0,
                    'even' => 1,
                    'result' => 1
                ];
            } else {      
                return [
                    'odd' => 1,
                    'even' => 0,
                    'result' => 0
                ];
            }
        }

        if (isset($this->cache[$i])) {
            return $this->cache[$i];
        }

        $sub = $this->sub($i + 1);

        if ($isEven) {
            $even = $sub['even'] + $sub['odd'] + 1;
            $odd = 0;

            $result = $sub['result'] + $even;
        } else {
            $even = $sub['even'];
            $odd = $sub['odd'] + 1;

            $result = $sub['result'] + $even;
        }

        return $this->cache[$i] = [
            'even' => $even,
            'odd' => $odd,
            'result' => $result
        ];
    }
}
