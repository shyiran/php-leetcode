<?php
class Solution {
    function heightChecker($heights) {
        $copy_heights=$heights;
        sort($heights);
        $count_change=0;
        for($i=0;$i<count($heights);$i++)
            ($heights[$i]!=$copy_heights[$i])?$count_change++:null;
        return $count_change;
    }
}