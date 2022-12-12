<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function truncateSentence($s, $k) {
        return implode(" ",array_slice(explode(" ",$s),0,$k));
    }
}
?>