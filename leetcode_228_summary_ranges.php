<?php
/*
228. 汇总区间
给定一个无重复元素的有序整数数组 nums 。

返回 恰好覆盖数组中所有数字 的 最小有序 区间范围列表。也就是说，nums 的每个元素都恰好被某个区间范围所覆盖，并且不存在属于某个范围但不属于 nums 的数字 x 。

列表中的每个区间范围 [a,b] 应该按如下格式输出：

"a->b" ，如果 a != b
"a" ，如果 a == b


示例 1：
输入：nums = [0,1,2,4,5,7]
输出：["0->2","4->5","7"]
解释：区间范围是：
[0,2] --> "0->2"
[4,5] --> "4->5"
[7,7] --> "7"

示例 2：
输入：nums = [0,2,3,4,6,8,9]
输出：["0","2->4","6","8->9"]
解释：区间范围是：
[0,0] --> "0"
[2,4] --> "2->4"
[6,6] --> "6"
[8,9] --> "8->9"

示例 3：
输入：nums = []
输出：[]

示例 4：
输入：nums = [-1]
输出：["-1"]

示例 5：
输入：nums = [0]
输出：["0"]

提示：

0 <= nums.length <= 20
-231 <= nums[i] <= 231 - 1
nums 中的所有值都 互不相同
nums 按升序排列

https://leetcode-cn.com/problems/summary-ranges/

*/

$arr = [0,2,3,4,6,8,9];
$arr = [0, 1];
var_dump((new Solution228())->summaryRanges($arr));

class Solution228
{
    function summaryRanges($nums)
    {
        if (!$nums) {
            return [];
        }
        $first = strval($nums[0]);
        if (count($nums) == 1) {
            return array($first);
        }

        $res = [];
        $end = $nums[0];
        for($i = 0; $i < count($nums); $i++) {
            $cur = $nums[$i];

            for ($j = 1; $j < count($nums); $j++) {
                if ($nums[$i + $j] != $nums[$i] + $j) {
                    $end = $nums[$i + $j - 1];
                    $i = $i + $j - 1;       // 会i++所以回退一位
                    break;
                } else if ($j == count($nums) - 1) {
                    // 到数组末尾依旧连续的情况
                    $end = $nums[$i + $j];
                    $i = count($nums) - 1;
                    break;
                }
            }

            $res[] = $cur == $end ? strval($cur) : $cur .'->'.$end;
        }
        return $res;
    }



}
