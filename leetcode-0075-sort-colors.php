<?php
/*
75. 颜色分类


相关企业
给定一个包含红色、白色和蓝色、共 n 个元素的数组 nums ，原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。
我们使用整数 0、 1 和 2 分别表示红色、白色和蓝色。
必须在不使用库内置的 sort 函数的情况下解决这个问题。


示例 1：
输入：nums = [2,0,2,1,1,0]
输出：[0,0,1,1,2,2]

示例 2：
输入：nums = [2,0,1]
输出：[0,1,2]

提示：
    n == nums.length
    1 <= n <= 300
    nums[i] 为 0、1 或 2


https://leetcode.cn/problems/sort-colors/
*/


class Solution75
{
    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        $left = 0;  //第一个0出现的位置
        $right = count($nums) - 1; //最后一个2出现的位置
        for ($i = 0; $i <= $right; $i++) {
            if ($nums[$i] == 0) {
                $this->swap($nums, $i, $left);//交换到嘴边
                $left++;
            } else if ($nums[$i] == 2) {
                $this->swap($nums, $i, $right);//调换到右边
                $right--;
                $i--;//对左边换来的元素再进行检查
            }
        }
    }
    function swap(&$nums, $i, $j) {
        $tmp = $nums[$j];
        $nums[$j] = $nums[$i];
        $nums[$i] = $tmp;
    }
}
