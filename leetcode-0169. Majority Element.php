<?php
class Solution {
    function majorityElement($nums) {
        $array=array();
        for($i=0;$i<count($nums);$i++)
            (isset($array[$nums[$i]]))?$array[$nums[$i]]+=1:$array[$nums[$i]]=1;
        return array_search(max($array),$array);
    }
}