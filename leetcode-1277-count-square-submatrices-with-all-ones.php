<?php
class Solution {
    function countSquares($matrix) {
        $dp=[];
        for($i=0;$i<count($matrix);$i++)
        {
            for($j=0;$j<count($matrix[0]);$j++)
            {
                $dp[$i][$j]=$matrix[$i][$j];
                if($i>0 and $j>0 and $dp[$i][$j]!=0)
                    $dp[$i][$j]=min($dp[$i-1][$j],$dp[$i][$j-1],$dp[$i-1][$j-1])+1;
                $ans+=$dp[$i][$j];
            }
        }
        return $ans;
    }
}