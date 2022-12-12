<?php
/*
 * 22. 括号生成
中等
3K
相关企业

数字 n 代表生成括号的对数，请你设计一个函数，用于能够生成所有可能的并且 有效的 括号组合。

 

示例 1：

输入：n = 3
输出：["((()))","(()())","(())()","()(())","()()()"]

示例 2：

输入：n = 1
输出：["()"]

 



https://leetcode.cn/problems/generate-parentheses/


 */
class Solution {

    /**
     * @param Integer $n
     * @return String[]
     */
    function generate($string,$left,$right,$n,$num,&$arr){
        if($n*2==$num){
            $arr[]=$string;
            return ;
        }
        if($left<$n)
            $this->generate($string.'(',$left+1,$right,$n,$num+1,$arr);
        if($right<$left)
            $this->generate($string.')',$left,$right+1,$n,$num+1,$arr);
    }
    function generateParenthesis($n) {
        $arr=[];
        $this->generate('',0,0,$n,0,$arr);
        return $arr;
    }
}
?>