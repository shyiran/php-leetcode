<?php
class Solution {
    function relativeSortArray($arr1, $arr2) {
        $ans=[];
        $dic=[];
        $different=[];
        foreach($arr2 as $value)
            $dic[$value]=0;
        for($i=0;$i<count($arr1);$i++)
            (isset($dic[$arr1[$i]]))?$dic[$arr1[$i]]++:array_push($different,$arr1[$i]);
        $i=0;
        foreach($dic as $key=>$value)
        {
            $now_number=array_fill($i,$value,$key);
            $ans=array_merge($ans,$now_number);
            $i+=$value;
        }
        sort($different);
        $ans=array_merge($ans,$different);
        return $ans;
    }
}