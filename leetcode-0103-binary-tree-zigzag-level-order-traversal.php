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
    function traverse($head,$level,&$ans){
        if($head){
            $ans[$level]?$ans[$level][]=$head->val:$ans[$level]=[$head->val];
            $this->traverse($head->left,$level+1,$ans);
            $this->traverse($head->right,$level+1,$ans);
        }
    }
    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        $ans=[];
        $this->traverse($root,0,$ans);
        return $ans;
    }
}

?>