<?php
class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function buildArray($nums) {
    $ans=[];
    foreach($nums as $numk=>$numv){
        $ans[]=$nums[$numv];
    }
    return $ans;
}
}
?>