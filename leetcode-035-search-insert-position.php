<?php
/*
35. 搜索插入位置
简单
1.8K
相关企业

给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。

请必须使用时间复杂度为 O(log n) 的算法。



示例 1:

输入: nums = [1,3,5,6], target = 5
输出: 2

示例 2:

输入: nums = [1,3,5,6], target = 2
输出: 1

示例 3:

输入: nums = [1,3,5,6], target = 7
输出: 4



提示:

    1 <= nums.length <= 104
    -104 <= nums[i] <= 104
    nums 为 无重复元素 的 升序 排列数组
    -104 <= target <= 104




https://leetcode.cn/problems/search-insert-position/
*/

class LeetCode27
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert(array $nums,int $target):int {
        $len = count($nums);
        $l =   0 ;
        $r = $len - 1;
        while ($l <= $r) {
            $mid = $l + (($r - $l) >> 1);
            if ($nums[$mid] == $target) {
                return $mid;
            } else if ($nums[$mid] > $target) {
                $r = $mid - 1;
            } else if ($nums[$mid] < $target) {
                $l = $mid + 1;
            }
        }
        return $l;
    }
}
