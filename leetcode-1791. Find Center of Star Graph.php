<?php
class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer
     */
    function findCenter($edges) {
        $hash=[];
        for($i=0;$i<count($edges);$i++){
            isset($edges[$i][0])?$hash[$edges[$i][0]]++:$edges[$i][0]=1;
            isset($edges[$i][1])?$hash[$edges[$i][1]]++:$edges[$i][1]=1;
        }
        arsort($hash);
        return key($hash);
    }
}
?>