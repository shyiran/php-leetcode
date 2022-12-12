<?php
/*
 * 给你一个按照非递减顺序排列的整数数组 nums，和一个目标值 target。请你找出给定目标值在数组中的开始位置和结束位置。

如果数组中不存在目标值 target，返回 [-1, -1]。

你必须设计并实现时间复杂度为 O(log n) 的算法解决此问题。

 

示例 1：

输入：nums = [5,7,7,8,8,10], target = 8
输出：[3,4]

示例 2：

输入：nums = [5,7,7,8,8,10], target = 6
输出：[-1,-1]

示例 3：

输入：nums = [], target = 0
输出：[-1,-1]

 

提示：

    0 <= nums.length <= 105
    -109 <= nums[i] <= 109
    nums 是一个非递减数组
    -109 <= target <= 109

https://leetcode.cn/problems/find-first-and-last-position-of-element-in-sorted-array/
 */

class Solution
{

    function searchRange($nums, $target)
    {
        $res = [ -1, -1 ];
        if (!$nums) {
            return $res;
        }
        $res[0] = $this->_findFirst ($nums, $target);
        $res[1] = $this->_findLast ($nums, $target);
        return $res;
    }


    protected function _findFirst($arr, $target) {
        $L = 0;
        $R = count($arr) - 1;
        $res = -1;
        while ($L <= $R) {
            $mid = $L + (($R - $L) >> 1);
            if ($arr[$mid] < $target) {
                $L = $mid + 1;
            } else if ($arr[$mid] > $target) {
                $R = $mid - 1;
            } else {
                $res = $mid;
                $R = $mid - 1;
            }
        }
        return $res;
    }

    protected function _findLast($arr, $target) {
        $L = 0;
        $R = count($arr) - 1;
        $res = -1;
        while ($L <= $R) {
            $mid = $L + (($R - $L) >> 1);
            if ($arr[$mid] < $target) {
                $L = $mid + 1;
            } else if ($arr[$mid] > $target) {
                $R = $mid - 1;
            } else {
                $res = $mid;
                $L = $mid + 1;
            }
        }
        return $res;
    }
}