<?php
class Solution {
    function sumZero($n) {
        $ans=[];
        for($i=0;$i<$n;$i++)
            $ans[$i]=$i*2-$n+1;
        return $ans;
    }
}