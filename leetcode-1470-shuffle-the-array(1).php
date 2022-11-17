<?php
/*
1470. 重新排列数组
简单
150
相关企业

给你一个数组 nums ，数组中有 2n 个元素，按 [x1,x2,...,xn,y1,y2,...,yn] 的格式排列。

请你将数组按 [x1,y1,x2,y2,...,xn,yn] 格式重新排列，返回重排后的数组。



示例 1：

输入：nums = [2,5,1,3,4,7], n = 3
输出：[2,3,5,4,1,7]
解释：由于 x1=2, x2=5, x3=1, y1=3, y2=4, y3=7 ，所以答案为 [2,3,5,4,1,7]

示例 2：

输入：nums = [1,2,3,4,4,3,2,1], n = 4
输出：[1,4,2,3,3,2,4,1]

示例 3：

输入：nums = [1,1,2,2], n = 2
输出：[1,2,1,2]



提示：

    1 <= n <= 500
    nums.length == 2n
    1 <= nums[i] <= 10^3

https://leetcode.cn/problems/shuffle-the-array/

*/

$arr = [6,5,4,4];
print_r((new Solution896())->isMonotonic($arr));

class Solution1470
{
    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle(array $nums, int $n):array {
        $res = [];
        $nums_l = count ($nums);
        $new_data = array_chunk ($nums, $n);
        $one_l = count ($new_data[0]);
        for ($i = 0; $i < $one_l; $i++) {
            foreach ($new_data as $val) {
                array_push ($res, $val[$i % $nums_l]);
            }
        }
        return $res;
    }
}
