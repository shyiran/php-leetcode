<?php
/*
1089. 复写零
简单
234
相关企业

给你一个长度固定的整数数组 arr ，请你将该数组中出现的每个零都复写一遍，并将其余的元素向右平移。

注意：请不要在超过该数组长度的位置写入元素。请对输入的数组 就地 进行上述修改，不要从函数返回任何东西。

 

示例 1：

输入：arr = [1,0,2,3,0,4,5,0]
输出：[1,0,0,2,3,0,0,4]
解释：调用函数后，输入的数组将被修改为：[1,0,0,2,3,0,0,4]

示例 2：

输入：arr = [1,2,3]
输出：[1,2,3]
解释：调用函数后，输入的数组将被修改为：[1,2,3]

 

提示：

    1 <= arr.length <= 104
    0 <= arr[i] <= 9

通过次数
55.3K
提交次数
91.5K
通过率
60.5%


https://leetcode.cn/problems/duplicate-zeros/
*/


class Solution1089
{
    /**
     * @param Integer[] $arr
     * @return NULL
     */
    function duplicateZeros(array $arr):array {
        $arr_l = count ($arr);
        $res = [];
        foreach ($arr as $key=>$val) {
            array_push($res,$val);
            if ($val == 0 ) {
                array_push($res,0);
            }
        }
        $a = array_chunk($res,$arr_l);
        return $a['0'];
    }
}
