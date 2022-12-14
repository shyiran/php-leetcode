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
    function getNode($root,&$curr){
        if($root){
            $curr[]=$root->val;
            if($root->left){
                $this->getNode($root->left,$curr);
            }
            if($root->right){
                $this->getNode($root->right,$curr);
            }
        }
    }
    function setNode(&$node,$curr,$i=0){
        if(count($curr)>$i){
            if(!$node){
                $node=new TreeNode($curr[$i]);
            }else{
                $node=new TreeNode($curr[$i],null,$node);
            }
            $this->setNode($node->right,$curr,$i+1);
        }
    }
    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function increasingBST($root) {
        $curr=[];
        $node=null;
        $this->getNode($root,$curr);
        sort($curr);
        $this->setNode($node,$curr);
        return $node;
    }
}
?>