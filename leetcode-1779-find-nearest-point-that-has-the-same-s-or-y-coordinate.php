<?php
class Solution {

/**
 * @param Integer $x
 * @param Integer $y
 * @param Integer[][] $points
 * @return Integer
 */
function nearestValidPoint($x, $y, $points) {
    $min=99999;
    $ans=-1;
    for($i=0;$i<count($points);$i++){
        if($points[$i][0]==$x || $points[$i][1]==$y){
            $distinct=abs($x-$points[$i][0])+abs($y-$points[$i][1]);
            if($distinct<$min){
                $min=$distinct;
                $ans=$i;
            }
        }
    }
    return $ans;
}
}
?>