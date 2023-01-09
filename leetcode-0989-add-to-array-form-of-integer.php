<?php
class Solution {

    /**
     * @param Integer[] $num
     * @param Integer $k
     * @return Integer[]
     */
    function addToArrayForm($num, $k) {
        $i=count($num)-1;
        while($k>0){
            $nowNum=$k%10;
            $k=floor($k/10);
            if(isset($num[$i])){
                $nowSum=$num[$i]+$nowNum;
                $num[$i]=$nowSum%10;
                $i--;
            }
            else{
                $nowSum=$nowNum;
                array_unshift($num,$nowSum);
            }
            $k+=floor($nowSum/10);
        }
        return $num;
    }
}
?>