<?php
    class Solution {
        function setCode(){
            $arr=[".-","-...","-.-.","-..",".","..-.","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",".-.","...","-","..-","...-",".--","-..-","-.--","--.."];
            $code=[];
            for($i=0;$i<count($arr);$i++){
                $code[chr($i+97)]=$arr[$i];
            }
            return $code;
        }
        /**
         * @param String[] $words
         * @return Integer
         */
        function uniqueMorseRepresentations($words) {
            $code=$this->setCode();
            $hash=[];
            $set=[];
            for($i=0;$i<count($words);$i++){
                if(!isset($set[$words[$i]])){
                    $set[$words[$i]]=true;
                    $str="";
                    for($j=0;$j<strlen($words[$i]);$j++){
                        $str.=$code[$words[$i][$j]];                    
                    }
                    $hash[$str]=true;
                }
            }
            return count($hash);
        }
    }
?>