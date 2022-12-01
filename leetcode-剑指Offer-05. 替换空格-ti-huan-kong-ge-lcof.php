<?php
/*
剑指 Offer 05. 替换空格
简单
375
相关企业

请实现一个函数，把字符串 s 中的每个空格替换成"%20"。

 

示例 1：

输入：s = "We are happy."
输出："We%20are%20happy."

 

限制：

0 <= s 的长度 <= 10000



https://leetcode.cn/problems/ti-huan-kong-ge-lcof
*/


class Solution05
{
    /**
     * @param String $s
     * @return String
     */
    function replaceSpace(string $s):string {
        if (empty($s)) {
            return '';
        }
        $result = '';
        $stringLength = strlen($s);
        for ($i = 0; $i < $stringLength; $i++) {
            $result .= ($s[$i] != ' ') ? $s[$i] : '%20';
        }
        return $result;
    }
}
