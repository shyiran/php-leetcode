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
    
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if(!$root) return 0;
         $maxleft = $this->maxDepth($root->left);
         $maxright = $this->maxDepth($root->right);
        return max($maxleft,$maxright)+1;
    }
}
?>