<?php
class Solution {
    function powerfulIntegers($x, $y, $bound) {
        $ans=[];$i=0;$j=0;
        $pow_x=pow($x,$i);
        $pow_y=pow($y,$j);
        while($pow_x<=$bound)
        {
            while($pow_x+$pow_y<=$bound)
            {
                $ans[$pow_x+$pow_y]=$pow_x+$pow_y;
                $j++;
                $pow_y=pow($y,$j);
                if($pow_y==1) break;
            }
            $j=0;$i++;
            $pow_y=pow($y,$j);
            $pow_x=pow($x,$i);
            if($pow_x==1) break;
        }
        return $ans;
    }
}