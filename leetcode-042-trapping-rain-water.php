<?php
/*
给定n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。


示例 1：

输入：height = [0,1,0,2,1,0,1,3,2,1,2,1]
输出：6
解释：上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。

示例 2：

输入：height = [4,2,0,3,2,5]
输出：9

提示：

    n == height.length
    1 <= n <= 2 * 104
    0 <= height[i] <= 105


https://leetcode.cn/problems/trapping-rain-water/
*/


class Solution042
{
    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap(array $height):int{
        //最多雨水
        $max_value = 0;
        $max_id = 0;
        $m_length = count($height);
        //获取最高值和最低值
        for($i = 0; $i < $m_length; $i ++) {
            if ($height [$i] > $max_value) {
                $max_value = $height [$i];
                $max_id = $i;
            }
        }
        // 定义最左边的高度
        $left_height = $height ['0'];
        // 定义总面积
        $area = 0;
        for($i = 0; $i < $max_id; $i ++) {
            if ($left_height < $height [$i]) {
                $left_height = $height [$i];
            } else {
                $area += $left_height - $height [$i];
            }
        }
        // 定义右侧
        $right_height = $height [$m_length - 1];
        for($i = $m_length - 1; $i > $max_id; $i --) {
            if ($right_height < $height [$i]) {
                $right_height = $height[$i];
            } else {
                $area += $right_height - $height [$i];
            }
        }
        return $area;
    }
}
