<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumberOfLIS($nums) {
        
        $cache = [];
        
        $longest = 0;
        $count = 0;
        
        foreach ($nums as $i => $num) {
            
            $prevLongest = 0;
            $prevCount = 0;
            
            foreach ($cache as $data) {
                
                if ($num > $data['max']) {
                    
                    if ($data['length'] > $prevLongest) {
                        $prevLongest = $data['length'];
                        $prevCount = $data['count'];
                    } else if ($data['length'] === $prevLongest) {
                        $prevCount += $data['count'];
                    }
                }
            }
            
            $currentLongest = 1 + $prevLongest;
            $currentCount = $prevCount ?: 1;
            
            $cache[$i] = [
                'max' => $num,
                'length' => $currentLongest,
                'count' => $currentCount
            ];
                                    
            if ($currentLongest > $longest) {
                $longest = $currentLongest;
                $count = $currentCount;
            } else if ($currentLongest === $longest) {
                $count += $currentCount;
            }
        }
        
        return $count;
    }

}
