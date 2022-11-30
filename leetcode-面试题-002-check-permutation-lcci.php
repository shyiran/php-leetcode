<?php
/*
面试题 01.02. 判定是否互为字符重排
简单
145
相关企业

给定两个由小写字母组成的字符串 s1 和 s2，请编写一个程序，确定其中一个字符串的字符重新排列后，能否变成另一个字符串。

示例 1：

输入: s1 = "abc", s2 = "bca"
输出: true

示例 2：

输入: s1 = "abc", s2 = "bad"
输出: false

说明：

    0 <= len(s1) <= 100
    0 <= len(s2) <= 100




https://leetcode.cn/problems/check-permutation-lcci
*/


class Solution002
{
    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function CheckPermutation (string $s1, string $s2): bool{
        if (strlen ($s1) != strlen ($s2)) {
            return false;
        }
        $a_s1 = str_split ($s1);
        $a_s2 = str_split ($s2);
        sort ($a_s1);
        sort ($a_s2);
        return $a_s1 == $a_s2;
    }
}
