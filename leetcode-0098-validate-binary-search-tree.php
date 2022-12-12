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
     * @return Boolean
     */
    function isValidBST($root,$min=null,$max=null) {
        if(!$root) return true;
        if($min!=null && $root->val<=$min->val) return false;
        if($max!=null && $root->val>=$max->val) return false;
        return $this->isValidBST($root->left,$min,$root) && $this->isValidBST($root->right,$root,$max);
        
    }
}
?>