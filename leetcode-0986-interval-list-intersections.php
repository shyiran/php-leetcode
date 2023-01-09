<?php
class Solution {

    /**
     * @param Integer[][] $firstList
     * @param Integer[][] $secondList
     * @return Integer[][]
     */
    function intervalIntersection($firstList, $secondList) {
        $firstLen=count($firstList);
        $secondLen=count($secondList);
        $i=0;$j=0;$ans=[];
        while($i<$firstLen && $j<$secondLen){
            $low=max($firstList[$i][0],$secondList[$j][0]);
            $high=min($firstList[$i][1],$secondList[$j][1]);
            if($low<=$high){
                $ans[]=[$low,$high];
            }
            if($firstList[$i][1]<$secondList[$j][1]){
                $i++;
            }else{
                $j++;
            }
        }
        return $ans;
    }
}
?>