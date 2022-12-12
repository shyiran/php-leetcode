<?php
class Solution {
    function sortedSquares($A) {
        $ans=[];
        for($i=0;$i<count($A);$i++)
            $ans[$i]=$A[$i]*$A[$i];
        sort($ans);
        return $ans;
    }
}