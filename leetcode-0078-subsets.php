<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $ans=[[]];
        for($i=0;$i<count($nums);$i++){
            $sub=[];
            for($j=0;$j<count($ans);$j++){
                $sub[]=array_merge($ans[$j],[$nums[$i]]);
            }
            for($k=0;$k<count($sub);$k++){
                $ans[]=$sub[$k];
            }
        }
        return $ans;
    }
}
?>