<?php
class Solution {
    function longestSubsequence($arr, $difference) {
        $dp=[];
        foreach($arr as $value)
            (array_key_exists($value-$difference,$dp))?$dp[$value]=$dp[$value-$difference]+1:$dp[$value]=1;
        return max($dp);
    }
}
