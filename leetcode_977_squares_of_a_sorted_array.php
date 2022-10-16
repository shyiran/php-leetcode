<?php
/*
977. 有序数组的平方
给你一个按 非递减顺序 排序的整数数组 nums，返回 每个数字的平方 组成的新数组，要求也按 非递减顺序 排序。

示例 1：
输入：nums = [-4,-1,0,3,10]
输出：[0,1,9,16,100]
解释：平方后，数组变为 [16,1,0,9,100]
排序后，数组变为 [0,1,9,16,100]

示例 2：
输入：nums = [-7,-3,2,3,11]
输出：[4,9,9,49,121]


提示：
1 <= nums.length <= 104
-104 <= nums[i] <= 104
nums 已按 非递减顺序 排序

*/

$arr = [-4,-1,0,3,10];
print_r((new Solution977())->sortedSquares($arr));
print_r((new Solution977())->sortedSquares2($arr));

class Solution977
{
    // 暴力法
    function sortedSquares($nums)
    {
        foreach ($nums as $k => $v) {
            $nums[$k] = $v * $v;
        }
        sort($nums);
        return $nums;
    }

    // 双指针
    public function sortedSquares2($nums)
    {
        $res = [];
        $len = count($nums) - 1;
        for ($i = 0, $j = $len; $i <= $j;) {
            if ($nums[$i] * $nums[$i] < $nums[$j] * $nums[$j]) {
                $res[$len--] =  $nums[$j] * $nums[$j];
                $j--;
            } else {
                $res[$len--] =  $nums[$i] * $nums[$i];
                $i++;
            }
        }
        return $res;
    }
}
