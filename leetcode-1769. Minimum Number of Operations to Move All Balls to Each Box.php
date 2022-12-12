<?php
class Solution {

/**
 * @param String $boxes
 * @return Integer[]
 */
function minOperations($boxes) {
    $boxLen=strlen($boxes);
    $count=0;
    $rightElement=0;
    $leftElement=0;
    $arr=[];
    for($i=0;$i<$boxLen;$i++){
        if($boxes[$i]){
            $rightElement++;
            $count+=$i;
        }    
    }
    for($i=0;$i<$boxLen;$i++){
        if($i){
            $count-=($rightElement-$leftElement);
        }
        $arr[]=$count;    
        if($boxes[$i]){
            $rightElement--;
            $leftElement++;
        }
    }
   
    return $arr;
}
}
?>