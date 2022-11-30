<?php
/*
面试题 01.01. 判定字符是否唯一
简单
251
相关企业

实现一个算法，确定一个字符串 s 的所有字符是否全都不同。

示例 1：

输入: s = "leetcode"
输出: false

示例 2：

输入: s = "abc"
输出: true

限制：

    0 <= len(s) <= 100
    s[i]仅包含小写字母
    如果你不使用额外的数据结构，会很加分。



https://leetcode.cn/problems/is-unique-lcci/
*/


class Solution001
{
    /**
     * @param String $astr
     * @return Boolean
     */
    function isUnique(string $astr):bool {
        $hash= [];
        $astr_l = strlen($astr);
        for($i=0;$i<$astr_l;$i++) {
            if ($hash[$astr[$i]]) {
                return false;
            }
            $hash[$astr[$i]] = 1;
        }
        return true;
    }
}
