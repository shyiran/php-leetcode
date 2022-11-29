<?php
/*
67. 二进制求和
简单
921
相关企业

给你两个二进制字符串 a 和 b ，以二进制字符串的形式返回它们的和。

 

示例 1：

输入:a = "11", b = "1"
输出："100"

示例 2：

输入：a = "1010", b = "1011"
输出："10101"

 

提示：

    1 <= a.length, b.length <= 104
    a 和 b 仅由字符 '0' 或 '1' 组成
    字符串如果不是 "0" ，就不含前导零




https://leetcode.cn/problems/add-binary/
*/


class Solution58
{
    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne(array $digits):array {
        $ans = bcadd(implode('', $digits), 1);
        return str_split($ans);
    }
}
