<?php
class Solution {

    /**
     * @param Integer[][] $rectangles
     * @return Integer
     */
    function countGoodRectangles($rectangles) {
        $hash=[];
        $maxLen=0;
        for($i=0;$i<count($rectangles);$i++){
            $len=min($rectangles[$i][0],$rectangles[$i][1]);
            $maxLen=max($maxLen,$len);
            isset($hash[$len])?$hash[$len]++:$hash[$len]=1;
        }
        return $hash[$maxLen];
    }
}
?>