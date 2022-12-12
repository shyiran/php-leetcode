<?php
class Solution {
    function kWeakestRows($mat, $k) {
        $hash=[];
        $m=count($mat);
        $i=0;
        $j=0;
        while(count($hash)!=$k)
        {
            ($mat[$i][$j]==0)?(!in_array($i,$hash))?array_push($hash,$i):null:null;
            ($i==$m-1)?($j++).($i=0):$i++;
        }
        return $hash;
    }
}