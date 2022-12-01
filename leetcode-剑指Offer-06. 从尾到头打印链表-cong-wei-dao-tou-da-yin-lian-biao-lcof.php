<?php
/*
输入一个链表的头节点，从尾到头反过来返回每个节点的值（用数组返回）。

 

示例 1：

输入：head = [1,3,2]
输出：[2,3,1]

 

限制：

0 <= 链表长度 <= 10000

https://leetcode.cn/problems/cong-wei-dao-tou-da-yin-lian-biao-lcof/
*/


class Solution06
{
    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function reversePrint($head) {
        $arr = [];
        while ($head !== null) {
            // 从数组头部添加
            array_unshift($arr, $head->val);
            $head = $head->next;
        }
        return $arr;
    }
}
