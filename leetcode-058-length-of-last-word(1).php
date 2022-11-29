<?php
/*
58. 最后一个单词的长度
简单
520
相关企业

给你一个字符串 s，由若干单词组成，单词前后用一些空格字符隔开。返回字符串中 最后一个 单词的长度。

单词 是指仅由字母组成、不包含任何空格字符的最大子字符串。

 

示例 1：

输入：s = "Hello World"
输出：5
解释：最后一个单词是“World”，长度为5。

示例 2：

输入：s = "   fly me   to   the moon  "
输出：4
解释：最后一个单词是“moon”，长度为4。

示例 3：

输入：s = "luffy is still joyboy"
输出：6
解释：最后一个单词是长度为6的“joyboy”。


https://leetcode.cn/problems/length-of-last-word/
*/


class Solution58
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord (string $s): int
    {
        $count = strlen ($s);
        if ($count < 1) {
            return 0;
        }
        $len = 0;
        for ($i = $count - 1; $i >= 0; $i--) {
            if ($s[$i] != ' ') {
                $len++;
            } elseif ($s[$i] == ' ' && $len != 0) {
                break;
            }
        }
        return $len;
    }
}
