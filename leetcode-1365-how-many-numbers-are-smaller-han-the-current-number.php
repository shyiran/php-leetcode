<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums) {
        $ans=[];
        $hash=[];
        $sort=$nums;
        sort($sort);
        for($i=0;$i<count($sort);$i++){
            if(!isset($hash[$sort[$i]])){
                $hash[$sort[$i]]=$i;
            }
        }
        for($j=0;$j<count($nums);$j++){
            $ans[]=$hash[$nums[$j]];
        }
        return $ans;
    }
}
?>