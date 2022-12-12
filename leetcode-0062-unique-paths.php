<?php
class Solution {
    function uniquePaths($m, $n) {
        $dp=array();
        for($i=0;$i<$m;$i++)
        {    
            for($j=0;$j<$n;$j++)
            {
                if ($i==0 and $j==0)
                    $dp[$i][$j]=1;
                else
                    $dp[$i][$j]=$dp[$i][$j-1]+$dp[$i-1][$j];
            }
        }
        return $dp[$m-1][$n-1];
    }
}