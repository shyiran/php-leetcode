<?php
class Solution {
    function tribonacci($n) {
        if($n<3) return ($n<2)?$n:1;
        $dp_tribonacci_array=[0,1,1];
        for($i=3;$i<=$n;$i++)
            $dp_tribonacci_array[$i]=$dp_tribonacci_array[$i-1]+$dp_tribonacci_array[$i-2]+$dp_tribonacci_array[$i-3];
        return $dp_tribonacci_array[count($dp_tribonacci_array)-1];
    }
}