<?php
class Solution {
    function countCharacters($words, $chars) {
        $chars=str_split($chars);
        $chars=array_count_values($chars);
        $copy_chars=$chars;
        $ans=0;
        for($i=0;$i<count($words);$i++)
        {
            $check=0;
            for($j=0;$j<strlen($words[$i]);$j++)
            {
                $str=$words[$i];
                if(empty($copy_chars[$str[$j]]))
                {
                    $check=1;
                    break;
                }
                $copy_chars[$str[$j]]--;
            }
            $copy_chars=$chars;
            ($check==0)?$ans+=strlen($words[$i]):null;
        }
        return $ans;                    
    }
}