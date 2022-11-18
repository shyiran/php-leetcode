<?php
/*
009. 回文数
给你一个整数 x ，如果 x 是一个回文整数，返回 true ；否则，返回 false 。
回文数是指正序（从左向右）和倒序（从右向左）读都是一样的整数。例如，121 是回文，而 123 不是。

示例 1：
输入：x = 121
输出：true

示例 2：
输入：x = -121
输出：false
解释：从左向右读, 为 -121 。 从右向左读, 为 121- 。因此它不是一个回文数。

示例 3：
输入：x = 10
输出：false
解释：从右向左读, 为 01 。因此它不是一个回文数。

示例 4：
输入：x = -101
输出：false


提示：
-2^31 <= x <= 2^31 - 1
https://leetcode-cn.com/problems/palindrome-number/
*/
declare (strict_types=1);
$arr = [ 121, -121, 10, -101 ];
$o = new Solution009();
$o->main ($arr);

class Solution009
{
    function main ($arr)
    {
        foreach ($arr as $item) {
            $res = $this->isPalindrome ($item);
            if ($res) {
                echo ($item . '是回文数');
            } else {
                echo ($item . '不是回文数');
            }
        }
    }

    function isPalindrome (int $x): bool
    {
        if ($x < 0) {
            return false;
        }
        $x = strval ($x);
        $l = 0;
        $r = strlen ($x) - 1;
        while ($l < $r) {
            if ($x[$l] != $x[$r]) {
                return false;
            }
            $l++;
            $r--;
        }
        return true;
    }
}
