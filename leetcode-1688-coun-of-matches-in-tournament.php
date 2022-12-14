<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numberOfMatches($n) {
        $sum=0;
        while($n>1){
            $sum+=floor($n/2);
            $n=ceil($n/2);
        }
        return $sum;
    }
}
?>