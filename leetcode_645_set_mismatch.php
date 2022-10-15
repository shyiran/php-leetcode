<?php
/*
645. 错误的集合
集合 s 包含从 1 到 n 的整数。不幸的是，因为数据错误，导致集合里面某一个数字复制了成了集合里面的另外一个数字的值，导致集合 丢失了一个数字 并且 有一个数字重复 。

给定一个数组 nums 代表了集合 S 发生错误后的结果。

请你找出重复出现的整数，再找到丢失的整数，将它们以数组的形式返回。


示例 1：
输入：nums = [1,2,2,4]
输出：[2,3]

示例 2：
输入：nums = [1,1]
输出：[1,2]


提示：
2 <= nums.length <= 104
1 <= nums[i] <= 104

https://leetcode-cn.com/problems/set-mismatch/

*/

$arr = [1,2,2,4];
$arr = [1,1];
$arr = [2,2];
print_r((new Solution645())->findErrorNums($arr));

class Solution645
{
    // 哈希
    function findErrorNums($nums)
    {
        $hash = [];
        $len = count($nums);
        foreach ($nums as $v) {
            if (isset($hash[$v])) {
                $hash[$v]++;
            } else {
                $hash[$v] = 1;
            }
        }
        $res = [];
        for ($i = 1; $i <= $len; $i++) {
            if (!isset($hash[$i])) {
                $res[1]  = $i;
            }
            if ($hash[$i] > 1) {
                $res[0] = $i;
            }
        }
        ksort($res);
        return $res;

    }

}
