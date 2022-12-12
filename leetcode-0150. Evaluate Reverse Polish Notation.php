<?php
class Solution {

    /**
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) {
        $stack=[];
        $nowNum=0;
        foreach($tokens as $num){
            if(is_numeric($num)){
                $stack[]=$num;
            }else{
                $rightNum=array_pop($stack);
                switch($num){
                    case '+':
                        $nowNum=array_pop($stack)+$rightNum;
                        break;
                    case '-':
                        $nowNum=array_pop($stack)-$rightNum;
                        break;
                    case '*':
                        $nowNum=array_pop($stack)*$rightNum;
                        break;
                    case '/':
                        $nowNum=(int)(array_pop($stack)/$rightNum);
                        break;
                }
                $stack[]=$nowNum;
            }
        }
        return array_pop($stack);
    }
}
?>