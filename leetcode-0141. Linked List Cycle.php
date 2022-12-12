<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        if(!$head) return false;
        $one=$head;
        $two=$head->next;
        while($two != NULL && $two->next != NULL){
            $one=$one->next;
            $two=$two->next->next;
            if($one == $two){
                return true;
            }
        }
        return false;
    }
}
?>