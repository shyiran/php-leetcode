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
    function bfs($node,&$sum,$level=0){
            if(!isset($sum[$level])){
                $sum[$level]=$node->val;
            }else{
                $sum[$level]+=$node->val;
            }
            if($node->left){
                $this->dfs($node->left,$sum,$level+1);
            }
            if($node->right){
                $this->dfs($node->right,$sum,$level+1);
            }
    }
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function deepestLeavesSum($root) {
        $sum=[];
        $this->bfs($root,$sum,0);
        return end($sum);
    }
}
?>