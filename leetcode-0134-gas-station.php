<?php
class Solution {
    function canCompleteCircuit($gas, $cost) {
        $all=0;
        $now=0;
        $ans=0;
        for($i=0;$i<count($gas);$i++)
        {
        $all+=$gas[$i]-$cost[$i];
        $now+=$gas[$i]-$cost[$i];
        ($now<0)?($now=0).($ans=$i+1):null;
        }
        return ($all>=0)?$ans:-1;
    }
}