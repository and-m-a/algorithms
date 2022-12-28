<?php 

class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        
        $map = [];

        foreach ($strs as $str) {
            $key = $this->sortString($str);

            $map[$key][] = $str;
        }

        return array_values($map);
    }

    function sortString($str) {
        $arr = str_split($str);

        sort($arr);

        return implode('', $arr);
    }
}
