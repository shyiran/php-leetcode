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
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head) {
        if(!$head || !$head->next){
            return $head;
        }
        if($head->val == $head->next->val){
            while($head->next && $head->val == $head->next->val){
                $head=$head->next;
            }
            return $this->deleteDuplicates($head->next);
        }else{
            $head->next = $this->deleteDuplicates($head->next);
            return $head;
        }
    }
}
?>