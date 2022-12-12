<?php
/*
 * 17. 电话号码的字母组合
中等
2.2K
相关企业

给定一个仅包含数字 2-9 的字符串，返回所有它能表示的字母组合。答案可以按 任意顺序 返回。

给出数字到字母的映射如下（与电话按键相同）。注意 1 不对应任何字母。

 

示例 1：

输入：digits = "23"
输出：["ad","ae","af","bd","be","bf","cd","ce","cf"]

示例 2：

输入：digits = ""
输出：[]

示例 3：

输入：digits = "2"
输出：["a","b","c"]
https://leetcode.cn/problems/letter-combinations-of-a-phone-number/

 */
class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function getWord(){
        $word['2'] = ["a","b","c"];
        $word['3'] = ["d","e","f"];
        $word['4'] = ["g","h","i"];
        $word['5'] = ["j","k","l"];
        $word['6'] = ["m","n","o"];
        $word['7'] = ["p","q","r","s"];
        $word['8'] = ["t","u","v"];
        $word['9'] = ["w","x","y","z"];
        return $word;
    }
    function Comb($digits,$word,$allComb,$nowIndex=1){
        if($nowIndex<strlen($digits)){
            $curr=[];
            for($i=0;$i<count($allComb);$i++){
                for($j=0;$j<count($word[$digits[$nowIndex]]);$j++){
                    $curr[]=$allComb[$i].$word[$digits[$nowIndex]][$j];
                }    
            }
            
            return $this->Comb($digits,$word,$curr,$nowIndex+1);
        }else{
            return $allComb;
        }
    }
    function letterCombinations($digits) {
        $word=$this->getWord();
        if(strlen($digits)==0) return [];
        if(strlen($digits)==1) return $word[$digits[0]];
        return $this->Comb($digits,$word,$word[$digits[0]]);
        
    }
}
?>