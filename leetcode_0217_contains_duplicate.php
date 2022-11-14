<?php
/*
217. 存在重复元素
# 题目
给定一个整数数组，判断是否存在重复元素。
如果存在一值在数组中出现至少两次，函数返回 true 。如果数组中每个元素都不相同，则返回 false 。
https://leetcode-cn.com/problems/contains-duplicate/

提示：
- 1 <= nums.length <= 10^5
- -10^9 <= nums[i] <= 10^9

# 示例
```
输入: [1,2,3,1]
输出: true
```

```
输入: [1,2,3,4]
输出: false
```

```
输入: [1,1,1,3,3,4,3,2,4,2]
输出: true
```

# 代码
*/
class LeetCode0217 {
    function containsDuplicate($nums) {
        sort($nums);
        $tmp = null;
        foreach ($nums as $item) {
            if ($item === $tmp) {
                return true;
            }
            $tmp = $item;
        }
        return false;
    }
}