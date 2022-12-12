<?php
/*
374. 猜数字大小

猜数字游戏的规则如下：

    每轮游戏，我都会从 1 到 n 随机选择一个数字。 请你猜选出的是哪个数字。
    如果你猜错了，我会告诉你，你猜测的数字比我选出的数字是大了还是小了。

你可以通过调用一个预先定义好的接口 int guess(int num) 来获取猜测结果，返回值一共有 3 种可能的情况（-1，1 或 0）：

    -1：我选出的数字比你猜的数字小 pick < num
    1：我选出的数字比你猜的数字大 pick > num
    0：我选出的数字和你猜的数字一样。恭喜！你猜对了！pick == num

返回我选出的数字。

 

示例 1：

输入：n = 10, pick = 6
输出：6

示例 2：

输入：n = 1, pick = 1
输出：1

示例 3：

输入：n = 2, pick = 1
输出：1

示例 4：

输入：n = 2, pick = 2
输出：2

 

https://leetcode.cn/problems/guess-number-higher-or-lower/
*/


class Solution374
{
    public $num = 0;
    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer[][] $indices
     * @return Integer
     */
    function oddCells(int $m, int $n, array $indices):int  {
        $dpMap1 = array_fill(0,$n,0);
        $dpMap2 = array_fill(0,$m,$dpMap1);
        //循环处理累计数
        foreach($indices as $i)
        {
            //处理行+1
            $this->rowAddtion($dpMap2[$i[0]]);
            //处理列+1
            $this->columnAddtion($dpMap2,$i[1]);
        }
        //最后处理奇数
        foreach($dpMap2 as $v)
        {
            foreach($v as $n)
            {
                if($n%2 != 0)
                {
                    $this->num++;
                }
            }
        }
        return $this->num;
    }
    //行加法处理
    public function rowAddtion(array &$arr)
    {
        foreach($arr as &$val){
            $val++;
        }
    }
    //列加法处理
    public function columnAddtion(array &$dataMap, int $i)
    {
        foreach($dataMap as &$val)
        {
            $val[$i]++;
        }
    }
}
