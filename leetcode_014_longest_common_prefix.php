<?php
/*
014：
# 题目

编写一个函数来查找字符串数组中的最长公共前缀。如果不存在公共前缀，返回空字符串。

说明:
- 所有输入只包含小写字母 a-z。
# 示例
```
输入: ["flower","flow","flight"]
输出: "fl"
```

```
输入: ["dog","racecar","car"]
输出: ""
解释: 输入不存在公共前缀。
```

# 解析

## 纵向扫描

纵向扫描时，从前往后遍历所有字符串的每一列，比较相同列上的字符是否相同，如果相同则继续对下一列进行比较，如果不相同则当前列不再属于公共前缀，
当前列之前的部分为最长公共前缀。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-common-prefix
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

class LeetCode0014
{
    function longestCommonPrefix($strs) {
        $count    = count($strs);        // 数组总数
        $first    = $strs[0];            // 第一个字符串
        $firstLen = strlen($first);      // 第一个字符串长度
        $res      = '';                  // 公共前缀结果
        # 循环第一个字符串
        for ($i = 0; $i < $firstLen; $i++) {
            $tmp = $first[$i];              // 第一个字符串的第i个字符
            # 遍历数组的其他字符串
            for ($j = 1; $j < $count; $j++) {
                # 判断字符串字符是否相等,不相等则直接返回,相等则在循环外拼接公共前缀
                if ($strs[$j][$i] != $tmp) {
                    return $res;
                }
            }
            $res .= $tmp;
        }
        return $res;
    }
}


