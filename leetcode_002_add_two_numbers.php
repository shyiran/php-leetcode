<?php
/*
002.给你两个非空的链表，表示两个非负的整数。它们每位数字都是按照逆序的方式存储的，并且每个节点只能存储一位数字。
请你将两个数相加，并以相同形式返回一个表示和的链表。
你可以假设除了数字 0 之外，这两个数都不会以 0 开头。

示例 1：
输入：l1 = [2,4,3], l2 = [5,6,4]
输出：[7,0,8]
解释：342 + 465 = 807.


示例 2：
输入：l1 = [0], l2 = [0]
输出：[0]


示例 3：
输入：l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
输出：[8,9,9,9,0,0,0,1]

解析：
由于输入的两个链表都是逆序存储数字的位数的，因此两个链表中同一位置的数字可以直接相加。
同时遍历两个链表，逐位计算它们的和，并与当前位置的进位值相加。具体而言，如果当前两个链表处相应位置的数字为 n1、n2，
进位值为 carry，则它们的和为 n1 + n2 + carry；其中，答案链表处相应位置的数字为 (n1 + n2 + carry) % 10，
而新的进位值为 floor( (n1 + n2 + carry) / 10 )
如果两个链表的长度不同，则可以认为长度短的链表的后面有若干个 0 。
此外，如果链表遍历结束后，有 carry > 0，还需要在答案链表的后面附加一个节点，节点的值为 carry。

来源：力扣（LeetCode）
链接：https://leetcode.cn/problems/add-two-numbers/
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
$l1 = [2, 4, 3];
$l2 = [5, 6, 4];
// 输出：[7,0,8]
//解释：342 + 465 = 807.
var_dump(addTwoNumbers($l1, $l2));
function addTwoNumbers($l1, $l2)
{
    $obj = null;
    $additional = 0;
    do {
        $value = $l1->val + $l2->val + $additional;
        if ($value < 10) {
            $additional = 0;
        } else {
            $value -= 10;
            $additional = 1;
        }
        $tmp_obj = new ListNode($value);
        if (is_null($obj)) {
            $obj = $tmp_obj;
        } else {
            $next->next = $tmp_obj;
        }
        $next = $tmp_obj;
        $l1 = $l1->next;
        $l2 = $l2->next;
    } while ($l1 || $l2 || $additional);
    return $obj;
}