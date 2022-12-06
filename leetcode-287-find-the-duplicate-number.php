<?php
/*
287. 寻找重复数
题目
给定一个包含 n + 1 个整数的数组 nums ，其数字都在 [1, n] 范围内（包括 1 和 n），可知至少存在一个重复的整数。
假设 nums 只有 一个重复的整数 ，返回 这个重复的数 。
你设计的解决方案必须 不修改 数组 nums 且只用常量级 O(1) 的额外空间。
进阶：
- 如何证明 nums 中至少存在一个重复的数字?
- 你可以设计一个线性级时间复杂度 O(n) 的解决方案吗？
https://leetcode.cn/problems/find-the-duplicate-number
提示：
- 1 <= n <= 105
- nums.length == n + 1
- 1 <= nums[i] <= n
- nums 中 只有一个整数 出现 两次或多次 ，其余整数均只出现 一次
# 示例
```
输入：nums = [1,3,4,2,2]
输出：2
```

```
输入：nums = [3,1,3,4,2]
输出：3
```

# 解析

## 有环链表找入环节点
假设 nums = [1, 4, 6, 6, 6, 2, 3]。将下标 i 从 0 开始，将 nums[i] 的值作为新的索引去找值，可得：nums[0] = 1；nums[1] = 4；
nums[4] = 6, nums[6] = 3, nums[3] = 6，到这里发现 6 已经存在过，因此可以想象成一个链表，头结点的值是 1，下一个节点是 4，
再下一个是 5，到最后值为 3 的节点又指回了指为 6 的节点，形成了环。

那么找重复的数字也就相当于 **有环链表找入环节点** 了。参考 [leetcode-0142-中等-环形链表II](./leetcode-0142-中等-环形链表II.md) 


# 代码
*/

class LeetCode0287 {
    function findDuplicate($nums) {
        if (!$nums || count($nums) < 2) {
            return -1;
        }
        $slow = $nums[0];
        $fast = $nums[$nums[0]];
        while ($slow != $fast) {
            $slow = $nums[$slow];
            $fast = $nums[$nums[$fast]];
        }
        $fast = 0;
        while ($slow != $fast) {
            $fast = $nums[$fast];
            $slow = $nums[$slow];
        }
        return $slow;
    }
}