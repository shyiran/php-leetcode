<?php
    class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function smallestRangeII($nums, $k) {
        sort($nums);
        $numsLen=count($nums);
        $minOld=$nums[0]+$k;
        $maxOld=$nums[$numsLen-1]-$k;
        $ans=$nums[$numsLen-1]-$nums[0];
        for($i=1;$i<count($nums);$i++){
            $newMax=max($nums[$i-1]+$k,$maxOld);
            $newMin=min($nums[$i]-$k,$minOld);
            $ans=min($ans,$newMax-$newMin);
        }
        return $ans;
    }
    }
?>