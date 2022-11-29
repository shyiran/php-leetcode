<?php
/*
    给定一个数组 coordinates ，其中 coordinates[i] = [x, y] ， [x, y] 表示横坐标为 x、纵坐标为 y 的点。请你来判断，这些点是否在该坐标系中属于同一条直线上。

示例 1：

输入：coordinates = [[1,2],[2,3],[3,4],[4,5],[5,6],[6,7]]
输出：true

示例 2：

输入：coordinates = [[1,1],[2,2],[3,4],[4,5],[5,6],[7,7]]
输出：false

 

提示：

    2 <= coordinates.length <= 1000
    coordinates[i].length == 2
    -10^4 <= coordinates[i][0], coordinates[i][1] <= 10^4
    coordinates 中不含重复的点

https://leetcode.cn/problems/check-if-it-is-a-straight-line/
*/


class Solution1232
{

    /**
     * @param Integer[][] $coordinates
     * @return Boolean
     */
    function checkStraightLine(array $coordinates):bool {
        $coordinates_l = count($coordinates);
        if($coordinates_l<=2){
            return true;
        }
        $A = $coordinates[1][1] - $coordinates[0][1];
        $B = $coordinates[0][0] - $coordinates[1][0];
        $C = $coordinates[1][0] * $coordinates[0][1] - $coordinates[0][0] * $coordinates[1][1];
        for ($i = 2; $i < $coordinates_l; $i++) {
            if (0 != $A * $coordinates[$i][0] + $B * $coordinates[$i][1] + $C) { return false; }
        }
        return true;
    }
}
