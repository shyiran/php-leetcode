<?php
/*
367. 有效的完全平方数
给定一个 正整数 num ，编写一个函数，如果 num 是一个完全平方数，则返回 true ，否则返回 false 。
进阶：不要 使用任何内置的库函数，如  sqrt 。

示例 1：
输入：num = 16
输出：true

示例 2：
输入：num = 14
输出：false


提示：
1 <= num <= 2^31 - 1

https://leetcode-cn.com/problems/valid-perfect-square/

*/

$num = 16;
$o = new Solution367();
$res = $o->main($num);
var_dump($res);

class Solution367
{
    public function main($num)
    {
        if ($num < 2) {
            return true;
        }
        $left = 2;
        $right = $num >> 1;
        while ($left <= $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($mid * $mid == $num) {
                return true;
            } else if ($mid * $mid < $num) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        return false;
    }
}
