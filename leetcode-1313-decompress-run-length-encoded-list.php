<?php
class Solution {
    function decompressRLElist($nums) {
        $ans=[];
        for($i=0;$i<count($nums);$i+=2)
        {
            $j=0;
            while($j<$nums[$i])
            {
                array_push($ans,$nums[$i+1]);
                $j++;
            }
        }
        return $ans;
    }
}