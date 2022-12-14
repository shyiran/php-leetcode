<?php
/**
 * @DESC: 697. 数组的度
 * 给定一个非空且只包含非负数的整数数组 nums，数组的度的定义是指数组里任一元素出现频数的最大值。
 * 你的任务是在 nums 中找到与 nums 拥有相同大小的度的最短连续子数组，返回其长度。
 * 示例 1：
    输入：[1, 2, 2, 3, 1]
    输出：2
    解释：
    输入数组的度是2，因为元素1和2的出现频数最大，均为2.
    连续子数组里面拥有相同度的有如下所示:
    [1, 2, 2, 3, 1], [1, 2, 2, 3], [2, 2, 3, 1], [1, 2, 2], [2, 2, 3], [2, 2]
    最短连续子数组[2, 2]的长度为2，所以返回2.
 * @param $nums
 * @return int
 * @link: https://leetcode-cn.com/problems/degree-of-an-array/
 */
function findShortestSubArray($nums) {
    $hash = [];
    $maxCount = 0;
    foreach ($nums as $k => $num) {
        if (isset($hash[$num])) {
            $hash[$num]['count']++;
            $hash[$num]['r'] = $k;
        }else {
            $hash[$num] = [
                'count' => 1,
                'l' => $k,
                'r' => $k,
            ];
        }
        $maxCount = max($maxCount, $hash[$num]['count']);
    }
    $res = PHP_INT_MAX;
    foreach ($hash as $item) {
        if ($item['count'] == $maxCount) {
            $res = min($res,$item['r']-$item['l']+1);
        }
    }
    return $res;
}

$nums = [1, 2, 2, 3, 1];
$nums = [1,2,2,3,1,4,2];
$nums = [1];
var_dump(findShortestSubArray($nums));