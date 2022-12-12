<?php
class Solution {

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function countOdds($low, $high) {
        return ceil(($high-$low)/2)+(($low%2 && $high%2)?1:0);
    }
}
?>