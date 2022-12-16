<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        $left=0;
        $right=count($nums)-1;
        while($left<$right){
            $mid=floor(($right+$left)/2);
            if($nums[$mid+1]<$nums[$mid]){
                $right=$mid;
            }else{
                $left=$mid+1;
            }
        }
        return $left;
    }
}
?>