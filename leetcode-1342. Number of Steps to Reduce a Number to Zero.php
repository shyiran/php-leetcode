<?php
class Solution {
    function numberOfSteps ($num) {
        $count=0;
        while($num>0)
        {
            ($num%2==0)?$num/=2:$num--;
            $count++;
        }
        return $count;
        
    }
}