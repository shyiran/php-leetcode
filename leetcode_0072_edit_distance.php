<?php
/*
## 72. 编辑距离
# 题目
给你两个单词 word1 和 word2，请你计算出将 word1 转换成 word2 所使用的最少操作数。

你可以对一个单词进行如下三种操作：
- 插入一个字符
- 删除一个字符
- 替换一个字符

链接：https://leetcode-cn.com/problems/edit-distance

# 示例：
```
输入：word1 = "horse", word2 = "ros"
输出：3
解释：
horse -> rorse (将 'h' 替换为 'r')
rorse -> rose (删除 'r')
rose -> ros (删除 'e')
```
```
输入：word1 = "intention", word2 = "execution"
输出：5
解释：
intention -> inention (删除 't')
inention -> enention (将 'i' 替换为 'e')
enention -> exention (将 'n' 替换为 'x')
exention -> exection (将 'n' 替换为 'c')
exection -> execution (插入 'u')
```


提示：
- 0 <= word1.length, word2.length <= 500
- word1 和 word2 由小写英文字母组成

# 解析

#### 动态规划

##### 确定dp数组及下标的含义
&emsp;&emsp;dp[i][j]表示以下标 i-1 结尾的字符串 word1 和以下标 j-1 结尾的字符串 word2 的最近编辑距离

##### 确定递推公式
&emsp;&emsp;在确定递推公式的时候，首先要考虑以下情况：
- 如果 word[i-1]==word2[j-1]，则不执行任何操作
- 如果 word[i-1]!=word2[j-1]，则有增加、删除、替换三种操作

&emsp;&emsp;如果 word[i-1]==word2[j-1]，则说明不用执行任何操作，即 dp[i][j]=dp[i-1][j-1]

&emsp;&emsp;如果 word[i-1]!=word2[j-1]，说明此时需要编辑了，如何编辑呢？

&emsp;&emsp;操作一：word1 删除一个元素，那么就是以下标 i-2 结尾的 word1 与下标 j-1 结尾的 word2的最近编辑距离再加上一个操作，
即 dp[i][j]=dp[i-1][j]+1

&emsp;&emsp;操作二：word2 删除一个元素，那么就是以下标 i-1 结尾的 word1 与下标 j-2 结尾的 word2的最近编辑距离再加上一个操作，
即 dp[i][j]=dp[i][j-1]+1

&emsp;&emsp;另外，添加元素，实际就是删除元素，最终操作数是一样的，不用重复讨论。

&emsp;&emsp;操作三：替换元素。word1 替换 word[i-1]，使其与 word2[j-1] 相同，此时不用增加元素，那么 dp[i][j] 就是以下标 
i-2 结尾的 word1 与下标 j-2 结尾的 word2 的最近编辑距离+一个替换元素的操作，即 dp[i][j]=dp[i-1][j-1]+1。

&emsp;&emsp;综上，当 word1[i-1]!=word2[j-1] 的时候，取最小的数值即可。

##### 初始化dp数组
&emsp;&emsp;dp[i][0]：以下标 i-1 结尾的word1 和空字符串 word2 的最近编辑距离。

&emsp;&emsp;对 word1 中的元素全部删除操作，即 dp[i][0]=i，同理 dp[0][j]=j

##### 确定遍历顺序
&emsp;&emsp;从上面分析的四个 dp[i][j] 推导公式可以看出，dp[i][j] 依赖于左方、上方和左上方的元素，所以顺序要从左到右、从上到下。

# 代码
*/
$word1 = "intention";$word2 = "execution";
(new LeetCode0072())->main($word1, $word2);

class LeetCode0072
{
    public function main($w1, $w2)
    {
        echo $this->minDistance($w1, $w2);
    }

    public function minDistance($w1, $w2)
    {
        $len1 = strlen($w1);
        $len2 = strlen($w2);
        $dp = array_fill(0, $len1 + 1, array_fill(0, $len2 + 1, 0));
        for ($i = 0; $i <= $len1; $i++) {
            $dp[$i][0] = $i;
        }
        for ($j = 0; $j <= $len2; $j++) {
            $dp[0][$j] = $j;
        }
        for ($i = 1; $i <= $len1; $i++) {
            for ($j = 1; $j <= $len2; $j++) {
                if ($w1[$i - 1] == $w2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = min($dp[$i - 1][$j - 1], $dp[$i - 1][$j], $dp[$i][$j - 1]) + 1;
                }
            }
        }
        return $dp[$len1][$len2];
    }

}