<?php
/*
2235. 两整数相加
简单
84
相关企业
给你两个整数 num1 和 num2，返回这两个整数的和。

 

示例 1：

输入：num1 = 12, num2 = 5
输出：17
解释：num1 是 12，num2 是 5 ，它们的和是 12 + 5 = 17 ，因此返回 17 。

示例 2：

输入：num1 = -10, num2 = 4
输出：-6
解释：num1 + num2 = -6 ，因此返回 -6 。

 

提示：

    -100 <= num1, num2 <= 100


https://leetcode.cn/problems/add-two-integers/
*/


class Solution58
{
    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function sum(int $num1,int $num2):int {
        return $num1+$num2;
    }
}
