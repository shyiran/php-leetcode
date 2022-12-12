<?php
/*
 * 给定两个单词 word1 和 word2 ，返回使得 word1 和  word2 相同所需的最小步数。

每步 可以删除任意一个字符串中的一个字符。

 

示例 1：

输入: word1 = "sea", word2 = "eat"
输出: 2
解释: 第一步将 "sea" 变为 "ea" ，第二步将 "eat "变为 "ea"

示例  2:

输入：word1 = "leetcode", word2 = "etco"
输出：4

 

提示：

    1 <= word1.length, word2.length <= 500
    word1 和 word2 只包含小写英文字母

https://leetcode.cn/problems/delete-operation-for-two-strings/

 */
class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance(string $word1,string $word2):int {
        $l1 = strlen($word1);
        $l2 = strlen($word2);
        $dp = [];
        for ($i = 0; $i <= $l1; $i++) {
            $dp[$i][0] = $i;
        }
        for ($j = 0; $j <= $l2; $j++) {
            $dp[0][$j] = $j;
        }

        for ($i = 1; $i <= $l1; $i++) {
            for ($j = 1; $j <= $l2; $j++) {
                if ($word1[$i - 1] == $word2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = 1 + min($dp[$i - 1][$j], $dp[$i][$j - 1]);
                }
            }
        }
        return $dp[$l1][$l2];
    }
}
