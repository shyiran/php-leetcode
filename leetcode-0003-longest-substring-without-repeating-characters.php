<?php
/*
003.给定一个字符串，请你找出其中不含有重复字符的 **最长子串** 的长度。
提示：
- 0 <= s.length <= 5 * 10<sup>4</sup>
- s 由英文字母、数字、符号和空格组成

示例 1：
输入: "abcabcbb"
输出: 3
解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。


示例 2：
输入: "bbbbb"
输出: 1
解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
示例 3:


示例 3：
输入: "pwwkew"
输出: 3
解释: 因为无重复字符的最长子串是"wke"，所以其长度为 3。
    请注意，你的答案必须是 子串 的长度，"pwke"是一个子序列，不是子串。

## 滑动窗口

&emsp;&emsp;维护一个滑动窗口，窗口内的都是没有重复的字符，去尽可能的扩大窗口的大小，窗口不停的向右滑动。

1. 如果当前遍历到的字符从未出现过，那么直接扩大右边界；
2. 如果当前遍历到的字符出现过，则缩小窗口（左边索引向右移动），然后继续观察当前遍历到的字符；
3. 重复上面两步，直到左边索引无法再移动；
4. 维护一个结果 max，每次用出现过的窗口大小来更新结果 max，最后返回 max 获取结果。

来源：力扣（LeetCode）
链接：https://leetcode.cn/problems/longest-substring-without-repeating-characters/
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class LeetCode0003
{
    // 滑动窗口
    function lengthOfLongestSubstring($s) {
        $len = strlen($s);
        $freq = array_fill(0, 256, 0);
        $res = 0;
        $left = 0;
        $right  = -1;    //滑动窗口 s[l...r]
        while ($left < $len) {
            if ( $right + 1 < $len && $freq[$s[$right + 1]] == 0 ) {
                $right++;
                $freq[$s[$right]]++;
            } else {
                $freq[$s[$left]]--;
                $left++;
            }
            $res = max($res, $right - $left + 1);
        }
        return $res;
    }
}