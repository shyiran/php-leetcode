<?php
/*
007.给你一个 32 位的有符号整数 x ，返回将 x 中的数字部分反转后的结果。
如果反转后整数超过 32 位的有符号整数的范围 [−2^31,  2^31 − 1] ，就返回 0。
假设环境不允许存储 64 位整数（有符号或无符号）。

提示：
- -2<sup>31</sup> <= x <= 2<sup>31</sup> - 1


示例 1：
输入：x = 123
输出：321

示例 2：
输入：x = -123
输出：-321


示例 3：
输入：x = 120
输出：21

示例 4：
输入：x = 0
输出：0


来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/reverse-integer/
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class LeetCode0007
{

    function reverse($x)
    {
        $isMinus = $x < 0;
        $x = abs($x);
        $i = 0;
        $j = strlen($x) -1;
        $s = strval($x);
        while ($i < $j) {
            echo 'i = '.$s[$i]. '  j = '.$s[$j].PHP_EOL;
            $tmp = $s[$i];
            $s[$i] = $s[$j];
            $s[$j] = $tmp;
            $i++;
            $j--;
        }
        if (intval($s) != 0) {
            $s = ltrim($s, '0');
        }
        if (intval($s) > 2147483647 || ($isMinus == true && intval($s) > 2147483648)) {
            return 0;
        }
        return $isMinus ? '-'.$s : $s;
    }
}