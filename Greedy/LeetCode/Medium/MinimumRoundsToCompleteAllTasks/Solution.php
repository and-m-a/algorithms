<?php

class Solution {

    /**
     * @param Integer[] $tasks
     * @return Integer
     */
    function minimumRounds($tasks) {
        
        $result = 0;
        $incomplete = 0;
        $grouped = [];

        foreach ($tasks as $difficulty) {

            $data = $grouped[$difficulty];

            if ($data[1]) {
                $data[2]++;
                $data[1] = 0;
                $incomplete--;
                $result++;
            } else if ($data[2]) {
                $data[2]--;
                $data[3]++;
            } else if ($data[3]) {
                $data[3]--;
                $data[2]+= 2;
                $result++;
            } else {
                $data[1]++;
                $incomplete++;
            }

            $grouped[$difficulty] = $data;
        }

        if ($incomplete > 0) {
            return -1;
        }

        return $result;
    }
}
