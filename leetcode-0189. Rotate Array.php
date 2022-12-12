<?php
class Solution {
    function rotate(&$nums, $k) {
        $nums_array=[];
        $n=count($nums);
        for($i=0;$i<$n;$i++)
            $nums_array[($i+$k)%$n]=$nums[$i];
        for($i=0;$i<$n;$i++)
            $nums[$i]=$nums_array[$i];
    }
}