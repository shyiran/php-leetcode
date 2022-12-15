<?php
/**

633. 平方数之和
中等
405
相关企业

给定一个非负整数 c ，你要判断是否存在两个整数 a 和 b，使得 a2 + b2 = c 。

 

示例 1：

输入：c = 5
输出：true
解释：1 * 1 + 2 * 2 = 5

示例 2：

输入：c = 3
输出：false

 

提示：

0 <= c <= 231 - 1


https://leetcode.cn/problems/sum-of-square-numbers/
 */
function judgeSquareSum($c) {
    if (pow(ceil(sqrt($c)),2) == $c) {
        return true;
    }
    $b = ceil(sqrt($c/2));
    if (pow($b,2) * 2 == $c) {
        return true;
    }
    for ($i = 1; $i < $b; $i++) {
        if (pow(ceil(sqrt($c - pow($i,2))),2) == $c - pow($i,2)) {
            return true;
        }
    }
    return false;
}
