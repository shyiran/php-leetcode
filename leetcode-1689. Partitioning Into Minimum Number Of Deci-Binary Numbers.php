<?php
class Solution {

    /**
     * @param String $n
     * @return Integer
     */
    function minPartitions($n) {
        $max=0;
        for($i=0;$i<strlen($n);$i++){
            $max=max($max,$n[$i]);
        }
        return $max;
    }
}
?>