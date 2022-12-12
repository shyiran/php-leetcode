<?php
class Solution {
    function largestSumAfterKNegations($A, $K) {
        sort($A);
        $index=0;
        while($K!=0)
        {
            $A[$index]=-$A[$index];
            ($index+1!=count($A) and $A[$index]>$A[$index+1])?$index++:null;
            --$K;
        }
        return array_sum($A);
    }
}