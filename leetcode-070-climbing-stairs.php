<?php
/*
70. 爬楼梯
简单
2.7K
相关企业

假设你正在爬楼梯。需要 n 阶你才能到达楼顶。

每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？

 

示例 1：

输入：n = 2
输出：2
解释：有两种方法可以爬到楼顶。
1. 1 阶 + 1 阶
2. 2 阶

示例 2：

输入：n = 3
输出：3
解释：有三种方法可以爬到楼顶。
1. 1 阶 + 1 阶 + 1 阶
2. 1 阶 + 2 阶
3. 2 阶 + 1 阶

 

提示：

    1 <= n <= 45


https://leetcode.cn/problems/climbing-stairs/
*/


class Solution58
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs(int $n):int {
        if( $n <= 2 ) return $n;
        $a = 1;
        $b = 2;
        for($i=3; $i<=$n; $i++){
            $c = $a + $b; //当前值
            $a = $b;      //第一个值替换
            $b = $c;      //第二个值替换
        }
        return $b;
    }
}
