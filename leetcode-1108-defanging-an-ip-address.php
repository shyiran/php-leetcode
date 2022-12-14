<?php
class Solution {
    function defangIPaddr($address){
        $str="";
        for($i=0;$i<strlen($address);$i++)
            ($address[$i]==".")?$str.="[".$address[$i]."]":$str.=$address[$i];
        return $str;
    }
}