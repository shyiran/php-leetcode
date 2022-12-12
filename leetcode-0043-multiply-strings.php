<?php
/*
 * 43. 字符串相乘
中等
1.1K
相关企业

给定两个以字符串形式表示的非负整数 num1 和 num2，返回 num1 和 num2 的乘积，它们的乘积也表示为字符串形式。

注意：不能使用任何内置的 BigInteger 库或直接将输入转换为整数。

 

示例 1:

输入: num1 = "2", num2 = "3"
输出: "6"

示例 2:

输入: num1 = "123", num2 = "456"
输出: "56088"

 

提示：

    1 <= num1.length, num2.length <= 200
    num1 和 num2 只能由数字组成。
    num1 和 num2 都不包含任何前导零，除了数字0本身。

通过次数
273.4K
提交次数
612.5K
通过率
44.6%


https://leetcode.cn/problems/multiply-strings/
 */

class Solution
{

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply(string $num1, string $num2):string {
        if ($num1 == "0" || $num2 == "0") {
            return "0";
        }

        $m     = strlen($num1);
        $n     = strlen($num2);
        $array = [];
        for ($i = $m - 1; $i >= 0; $i--) {
            for ($j = $n - 1; $j >= 0; $j--) {
                $array[$i + $j + 1] += $num1[$i] * $num2[$j];
            }
        }
        $res = "";
        for ($i = $m + $n - 1; $i >= 0; $i--) {
            if ($array[$i] > 9) {
                $array[$i - 1] += floor($array[$i] / 10);
                $array[$i] %= 10;
            }
            $res = (string) $array[$i] . $res;
        }
        return $res;
    }
}
