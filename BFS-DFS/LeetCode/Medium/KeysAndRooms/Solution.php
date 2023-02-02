<?php

class Solution {

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms) {
        $visitedCount = 0;
        $targetCount = count($rooms);

        $queue = [0];
        $visited = [0 => true];

        while ($queue) {
            $room = array_shift($queue);
            $keys = $rooms[$room];
            $visitedCount++;

            foreach ($keys as $key) {
                $new = !$visited[$key];

                if ($new) {
                    $queue[] = $key;
                    $visited[$key] = true;
                }
            }
        }

        return $visitedCount === $targetCount;
    }
}
