<?php

/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if ($root->left) {
            $this->connectQueue([$root]);
        }

        return $root;
    }

    function connectQueue(array $queue) {
  
        $newQueue = [];
        $length = count($queue);
        $current = $queue[0];

        for ($i = 1; $i < $length; $i++) {
            $current->next = $queue[$i];

            $newQueue[] = $current->left;
            $newQueue[] = $current->right;

            $current = $queue[$i];
        }

        $newQueue[] = $current->left;
        $newQueue[] = $current->right;

        if ($newQueue[0]) {
          $this->connectQueue($newQueue);
        }
    }
}
