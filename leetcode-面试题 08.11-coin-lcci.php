<?php
/*
面试题 08.11. 硬币
中等
266
相关企业

硬币。给定数量不限的硬币，币值为25分、10分、5分和1分，编写代码计算n分有几种表示法。(结果可能会很大，你需要将结果模上1000000007)

示例1:

 输入: n = 5
 输出：2
 解释: 有两种方式可以凑成总金额:
5=5
5=1+1+1+1+1

示例2:

 输入: n = 10
 输出：4
 解释: 有四种方式可以凑成总金额:
10=10
10=5+5
10=5+1+1+1+1+1
10=1+1+1+1+1+1+1+1+1+1

说明：

注意:

你可以假设：

    0 <= n (总金额) <= 1000000



https://leetcode.cn/problems/coin-lcci
*/


class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function waysToChange(int $n):int {
        if($n<=1){
            return $n;
        }
        $dp    = [];
        $coins = [1, 5, 10, 25];
        for ($i = 0; $i <= $n; $i++) {
            $dp[$i] = 0;
        }
        for ($i = 0; $i < count($coins); $i++) {
            $dp[$coins[$i]] += 1;
            for ($j = $coins[$i]; $j <= $n; $j++) {
                $dp[$j] += $dp[$j - $coins[$i]];
            }
        }
        return $dp[$n] % 1000000007;
    }
}
