<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $max=$nums[0];
        $now=$nums[0];
        $min=$nums[0];
        for($i=1;$i<count($nums);$i++){
            $now+=$nums[$i];
            $max=max($max,$now);
            $max=max($max,$now-$min);
            $min=min($min,$now);
        }
        return $max;
    }
}
?>