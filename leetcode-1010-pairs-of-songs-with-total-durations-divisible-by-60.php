<?php
class Solution {

/**
 * @param Integer[] $time
 * @return Integer
 */
function numPairsDivisibleBy60($time) {
    $hash=[];
    $count=0;
    for($i=0;$i<count($time);$i++){
        $nums=$time[$i]%60;
        $need=(60-$nums)%60;
        $count+=$hash[$need];
        $hash[$nums]++;
    }
    return $count;
}
}
?>
