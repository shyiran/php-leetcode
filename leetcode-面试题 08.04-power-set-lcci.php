<?php
/*
幂集。编写一种方法，返回某集合的所有子集。集合中不包含重复的元素。

说明：解集不能包含重复的子集。

示例:

 输入： nums = [1,2,3]
 输出：
[
  [3],
  [1],
  [2],
  [1,2,3],
  [1,3],
  [2,3],
  [1,2],
  []
]


https://leetcode.cn/problems/power-set-lcci/
*/


class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets(array $nums):array {
        $arr = [];
        foreach ($nums as $val) {
            foreach ($arr as $val2) {
                $arr[] = array_merge($val2,[$val]);
            }
            $arr[] = [$val];
        }
        $arr[] = [];
        return $arr;
    }
}
