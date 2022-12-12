<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countKDifference($nums, $k) {
        $hash=[];
        $count=0;
        for($i=0;$i<count($nums);$i++){
            if(isset($hash[$nums[$i]+$k])){
                $count+=$hash[$nums[$i]+$k];
            }
            if(isset($hash[$nums[$i]-$k])){
                $count+=$hash[$nums[$i]-$k];
            }
            $hash[$nums[$i]]++;
        }
        return $count;
    }
}
?>