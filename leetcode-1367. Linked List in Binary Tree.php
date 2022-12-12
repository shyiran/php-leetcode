<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
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
    function checkToLeaf($head,$root){
       if(!$head)
           return true;
       if(!$root)
           return false;
       if($head->val == $root->val)
           return $this->checkToLeaf($head->next,$root->left) || $this->checkToLeaf($head->next,$root->right);
    }
    function checkHead($head,$root,&$status){
        if($root){
            if($head->val==$root->val){
                if($this->checkToLeaf($head,$root))
                    $status=true;
            }
            if(!$status)
                $this->checkHead($head,$root->left,$status);
            if(!$status)
                $this->checkHead($head,$root->right,$status);
        }
    }
    /**
     * @param ListNode $head
     * @param TreeNode $root
     * @return Boolean
     */
    function isSubPath($head, $root) {
        if(!$head){
            return true;
        }
        if(!$root){
            return false;
        }
        $status=false;
        $this->checkHead($head,$root,$status);
        return $status;
    }
}
?>