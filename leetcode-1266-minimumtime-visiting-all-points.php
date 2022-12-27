<?php
class Solution {
    function minTimeToVisitAllPoints($points) {
        $x_1=$points[0][0];
        $y_1=$points[0][1];
        $distance=0;
        for($i=1;$i<count($points);$i++)
        {
            $x_2=$points[$i][0];
            $y_2=$points[$i][1];
            $distance+=max(abs($x_1-$x_2),abs($y_1-$y_2));
            $x_1=$x_2;
            $y_1=$y_2;
        }
        return $distance;
    }
}