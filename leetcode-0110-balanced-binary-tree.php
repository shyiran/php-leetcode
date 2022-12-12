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

    function isBalanced($root) {
       $isBalanced = true;
       $this->getTreeDeepth($root, $isBalanced);
       return $isBalanced;
   }
   
   function getTreeDeepth($tree, &$isBalanced) {
       if ($tree === null) {
           return 0;
       }
       $leftDepth = $this->getTreeDeepth($tree->left, $isBalanced);
       $rightDepth = $this->getTreeDeepth($tree->right, $isBalanced);
       if (abs($leftDepth - $rightDepth) > 1) {
           $isBalanced = false;
           return 0;
       }
       return max($leftDepth, $rightDepth) + 1;
   }
}
?>