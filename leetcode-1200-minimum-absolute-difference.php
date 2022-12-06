<?php
/*
1200. 最小绝对差
给你个整数数组 arr，其中每个元素都 不相同。

请你找到所有具有最小绝对差的元素对，并且按升序的顺序返回。

示例 1：
输入：arr = [4,2,1,3]
输出：[[1,2],[2,3],[3,4]]

示例 2：
输入：arr = [1,3,6,10,15]
输出：[[1,3]]

示例 3：
输入：arr = [3,8,-10,23,19,-4,-14,27]
输出：[[-14,-10],[19,23],[23,27]]


提示：
2 <= arr.length <= 10^5
-10^6 <= arr[i] <= 10^6

https://leetcode-cn.com/problems/minimum-absolute-difference/

*/

$arr = [3, 8, -10, 23, 19, -4, -14, 27];
print_r((new Solution1200())->minimumAbsDifference($arr));

class Solution1200
{
    function minimumAbsDifference($arr)
    {
        sort($arr);
        $len    = count($arr);
        $result = [];
        $min    = PHP_INT_MAX;
        for ($i = 0, $j = 1; $j < $len; $i++, $j++) {
            $left  = $arr[$i];
            $right = $arr[$j];
            $diff = $right - $left;
            if ($diff < $min) {
                $min = $diff;
                $result = array([$left, $right]);
            } else if ($diff == $min) {
                $result[] = [$left, $right];
            }
        }
        return $result;

    }

}
