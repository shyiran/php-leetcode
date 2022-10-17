<?php
/*
006. 将一个给定字符串 s 根据给定的行数 numRows ，以从上往下、从左到右进行 Z 字形排列。
比如输入字符串为 "PAYPALISHIRING" 行数为 3 时，排列如下：

P   A   H   N
A P L S I I G
Y   I   R

之后，你的输出需要从左往右逐行读取，产生出一个新的字符串，比如："PAHNAPLSIIGYIR"。
请你实现这个将字符串进行指定行数变换的函数：
string convert(string s, int numRows);



示例 1：
输入：s = "PAYPALISHIRING", numRows = 3
输出："PAHNAPLSIIGYIR"

示例 2：
输入：s = "PAYPALISHIRING", numRows = 4
输出："PINALSIGYAHRPI"
解释：
P     I    N
A   L S  I G
Y A   H R
P     I

示例 3：
输入：s = "A", numRows = 1
输出："A"

提示：
    1 <= s.length <= 1000
    s 由英文字母（小写和大写）、',' 和 '.' 组成
    1 <= numRows <= 1000

来源：力扣（LeetCode）
链接：https://leetcode.cn/problems/zigzag-conversion
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        //数组用来存每行的字符
        $res = [];
        //记录当前行的下标
        $i = 0;
        //判断是自增还是自减
        $is_add = true;
        //当行数 = 1的时候，直接返回字符串
        if($numRows == 1){
            return $s;
        }
        for($k = 0;$k<strlen($s);$k++){
            //当到了numRows，i需要转换方向计算
            if($i>=$numRows-1){
                $is_add =!$is_add;
            }
            if($k!=0 && $i<=0){
                $is_add = !$is_add;
            }
            $word = $s[$k];
            //如果没有i行的记录，新建数组
            if(!isset($res[$i])){
                $res[$i] = [];
            }
            array_push($res[$i],$word);
            if($is_add){
                $i++;
            }else{
                $i--;
            }
        }
        //把每列表的数组合并成字符串
        $l = '';
        foreach($res as $key => $val){
            $l = $l . implode('',$val);
        }
        return $l;
    }
}