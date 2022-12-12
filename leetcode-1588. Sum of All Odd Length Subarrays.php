<?php
class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function sumOddLengthSubarrays($arr) {
    $ans = 0;
    $n = count($arr);
    for($i=0;$i<$n;$i++){
        $start = $n-$i;//新增的起始點
        $end = $i+1;//新增的終點
        $total = $start * $end;//總共會加幾次
        //以上都是計算全部的情況
        $odd = floor( $total/2 ) + ($total % 2);
        //floor( $total/2 ) 指加上一半的情況因為只加奇數
        //($total % 2) 當新增的為奇數次的項目會需要再多加一次
        $ans += $odd * $arr[$i];
    }
    return $ans;
}
}
?>