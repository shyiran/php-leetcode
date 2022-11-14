<?php
/*
215. 数组中的第K个最大元素

# 题目
给定整数数组 nums 和整数 k，请返回数组中第 k 个最大的元素。

请注意，你需要找的是数组排序后的第 k 个最大的元素，而不是第 k 个不同的元素。

提示：
- 1 <= k <= nums.length <= 10^4 
- -10^4 <= nums[i] <= 10^4

# 示例
```
输入: [3,2,1,5,6,4] 和 k = 2
输出: 5
```
```
输入: [3,2,3,1,2,4,5,5,6] 和 k = 4
输出: 4
```
https://leetcode.cn/problems/kth-largest-element-in-an-array/

# 解析

大根堆


# 代码
*/
class LeetCode0215 {
    function findKthLargest($nums, $k) {
        $num = 0;
        $heap = new SplMaxHeap();
        foreach ($nums as $num) {
            $heap->insert($num);
        }
        for (; $k > 0; $k--) {
            $num = $heap->extract();
        }
        return $num;
    }
}