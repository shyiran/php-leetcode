<?php
/*
# 139. 单词拆分
# 题目
给你一个字符串 s 和一个字符串列表 wordDict 作为字典。请你判断是否可以利用字典中出现的单词拼接出 s 。
注意：不要求字典中出现的单词全部都使用，并且字典中的单词可以重复使用。

https://leetcode-cn.com/problems/word-break/

提示：
- 1 <= s.length <= 300
- 1 <= wordDict.length <= 1000
- 1 <= wordDict[i].length <= 20
- s 和 wordDict[i] 仅有小写英文字母组成
- wordDict 中的所有字符串 互不相同

# 示例：
```
输入: s = "leetcode", wordDict = ["leet", "code"]
输出: true
解释: 返回 true 因为 "leetcode" 可以由 "leet" 和 "code" 拼接成。
```

```
输入: s = "applepenapple", wordDict = ["apple", "pen"]
输出: true
解释: 返回 true 因为 "applepenapple" 可以由 "apple" "pen" "apple" 拼接成。
     注意，你可以重复使用字典中的单词。
```

```
输入: s = "catsandog", wordDict = ["cats", "dog", "sand", "and", "cat"]
输出: false
```



# 解析

## 动态规划
单词就是物品，字符串 s 就是背包，单词能否组成字符串 s，就是问物品能不能装满背包。可以重复使用单词，那么就是一个完全背包问题

### 定义 dp 数组
dp[i]：字符串的长度为 i，dp[i] 赋值为 true，表示可以拆分成为一个或多个字典中的单词

### 确定递推公式
如果 dp[j] 为 true，且 [j, i] 区间的子字符串出现在字典中，那么 dp[i] 一定是 true。

所以递推公式是：如果 [j, i] 这个区间的子字符串出现在字典中，同时 dp[j] 为 true，那么 dp[i] = true

### 初始化
从递推公式可以看出，dp[i] 的状态依赖于 dp[j] 是否为 true，那么 dp[0] 就是递推的根基，必须为 true，否则后面的都是 false 了。

dp[0] 表示字符串的长度为 0。但题目中说了“给定一个非空字符串s”，所以测试数据不会出现 i 为 0 的情况，

dp[0] 初始化为 true 只是为了推导递推公式。下标非 0 的 dp[i] 初始化为 false，只要没有被覆盖，说明这些字符串都是不可拆分为若干个字典中的单词

### 遍历顺序
因为要求子字符串，所以最好将遍历背包的逻辑放在外循环中，将遍历物品的逻辑放在内循环中


# 代码

*/

class Node0139 {
    public $end;
    public $nexts;
    
    function __construct() {
        $this->end = false;
        $this->nexts = [];
    }
}

class LeetCode0139 {

    public function wordBreak($s, $wordDict) {
        $map = [];
        foreach ($wordDict as $word) {
            $map[$word] = 1;
        }
        $len = strlen($s);
        $dp = array_fill(0, $len + 1, false);
        $dp[0] = true;
        for ($i = 1; $i <= $len; $i++) {
            for ($j = 0; $j < $i; $j++) {
                $word = substr($s, $j, $i - $j);
                if (array_key_exists($word, $map) && $dp[$j]) {
                    $dp[$i] = true;
                }
            }
        }
        return $dp[$len];
    }
    
    public function wordBreak2($s, $wordDict) {
        $root = new Node0139();
        foreach ($wordDict as $str) {
            $node = $root;
            for ($i = 0, $len = strlen($str); $i < $len; $i++ ) {
                $index = ord($str[$i]) - ord('a');
                if ($node->nexts[$index] == null) {
                    $node->nexts[$index] = new Node0139();
                }
                $node = $node->nexts[$index];
            }
            $node->end = true;
        }
        $str = $s;
        $N = strlen($str);
        $dp = array_fill(0, $N + 1, 0);
        $dp[$N] = 1;
        for ($i = $N - 1;  $i >= 0; $i--) {
            $cur = $root;
            for ($end = $i; $end < $N; $end++) {
                $cur = $cur->nexts[ord($str[$end]) - ord('a')];
                if ($cur == null) {
                    break;
                }
                if ($cur->end) {
                    $dp[$i] += $dp[$end + 1];
                }
            }
        }
        return $dp[0] != 0;
    }

}
```