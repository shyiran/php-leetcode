<?php
class Solution {

    /**
     * @param Integer[][] $dungeon
     * @return Integer
     */
    function calculateMinimumHP($dungeon) {
        $dp=[];
        $m=count($dungeon[0])-1;
        $n=count($dungeon)-1;
        for($i=$n;$i>=0;$i--){
            for($j=$m;$j>=0;$j--){
                if($i==$n && $j==$m){
                    $dp[$i][$j]=($dungeon[$i][$j]>=0)?1:abs($dungeon[$i][$j])+1;//最右下角起點
                }else if($j==$m){
                    $dp[$i][$j]=max(1,$dp[$i+1][$j]-$dungeon[$i][$j]);//最右邊那排,因為頂多往下取因此i+1
                }else if($i==$n){
                    $dp[$i][$j]=max(1,$dp[$i][$j+1]-$dungeon[$i][$j]);//最下邊那排,因為頂多往右取因此j+1
                }else{
                    $dp[$i][$j]=max(1,min($dp[$i+1][$j],$dp[$i][$j+1])-$dungeon[$i][$j]);//中間的需要考慮下右兩項取最小，達到扣最少寫
                }
            }   
        }
        return $dp[0][0];
    }
}
}
?>