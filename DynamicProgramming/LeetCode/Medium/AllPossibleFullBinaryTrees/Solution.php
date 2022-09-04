<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {
    
    private $cache = [];

    /**
     * @param Integer $n
     * @return TreeNode[]
     */
    function allPossibleFBT($n) {
        
        if ($n === 0) {
            return [];
        }
        
        $root = new TreeNode(0);
        
        if ($n === 1) {
            return [$root];
        }
        
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        
        $result = [];
        
        for ($left = 0; $left < $n; $left++) {
            $right = $n - $left - 1;
            
            $lR = $this->allPossibleFBT($left);
            $rR = $this->allPossibleFBT($right);
            
            foreach($lR as $leftSubTree) {
                foreach ($rR as $rightSubTree) {
                    $newTree = clone $root;
                    $newTree->left = $leftSubTree;
                    $newTree->right = $rightSubTree;
                    
                    $result[] = $newTree;
                }
            }
        }
        
        return $this->cache[$n] = $result;
    }
}
