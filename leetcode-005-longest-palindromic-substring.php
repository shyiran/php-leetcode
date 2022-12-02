<?php
/*
005.给你一个字符串 s，找到 s 中最长的回文子串。
提示：
- 1 <= s.length <= 1000
- s 仅由数字和英文字母（大写和/或小写）组成


示例 1：
输入：s = "babad"
输出："bab"
解释："aba" 同样是符合题意的答案。

示例 2：
输入：s = "cbbd"
输出："bb"


示例 3：
输入：s = "a"
输出："a"

示例 4：
输入：s = "ac"
输出："a"


来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-palindromic-substring/
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class LeetCode0005
{
    protected $len    = 0;      // 字符串长度
    protected $start  = 0;      // 起始位置
    protected $length = 0;      // 截取长度

    function longestPalindrome($s)
    {
        $this->len = strlen($s);
        for ($i = 0; $i < strlen($s); $i++) {
            // 如果起始位置 + 截取长度 = 字符串长度，就不需要继续循环下去，因为可以确定当前长度是最长的
            if ($this->start + $this->length >= $this->len)
                break;

            // 以 s[i] 为中心的最长回文子串
            $this->palindrome($s, $i, $i);
            // 以 s[i] 和 s[i+1] 为中心的最长回文子串
            $this->palindrome($s, $i, $i + 1);
        }
        return substr($s, $this->start, $this->length);
    }

    protected function palindrome($s, $l, $r) {
        // 防止索引越界
        while ($l >= 0 && $r < strlen($s)
            && $s[$l] == $s[$r]) {
            // 向两边展开
            $l--; $r++;
        }
        $len = $r - $l - 1; // 因为left和right都向外走了一格，所以长度为 r-l+1-2 = r-l-1
        if ($len > $this->length) {
            $this->start = $l + 1;
            $this->length = $len;
        }
    }

}