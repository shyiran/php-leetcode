<?php
/*
将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。

    示例 1：

        输入：l1 = [1,2,4], l2 = [1,3,4]
        输出：[1,1,2,3,4,4]

    示例 2：

        输入：l1 = [], l2 = []
        输出：[]

    示例 3：

        输入：l1 = [], l2 = [0]
        输出：[0]


提示：

    两个链表的节点数目范围是 [0, 50]
    -100 <= Node.val <= 100
    l1 和 l2 均按 非递减顺序 排列


https://leetcode.cn/problems/merge-two-sorted-lists/
*/

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}
class Solution21 extends ListNode {
    function mergeTwoLists ( $l1,  $l2):array
    {
        if (!$l1 ) {
            return $l2;
        }
        if (!$l2) {
            return $l1;
        }
        $current = $head = new ListNode(0);//虚拟头结点
        while($l1 || $l2){
            if(!$l1){
                $current->next = $l2;
                break;
            }
            if(!$l2){
                $current->next = $l1;
                break;
            }
            if($l1->val < $l2->val){
                $current->next = $l1;
                $current = $current->next;
                $l1 = $l1->next;
            }else{
                $current->next = $l2;
                $current = $current->next;
                $l2 = $l2->next;
            }
            return $head->next;
        }
        return [];
    }
}
