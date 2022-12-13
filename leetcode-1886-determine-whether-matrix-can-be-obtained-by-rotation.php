<?php
class Solution {

    /**
     * @param Integer[][] $mat
     * @param Integer[][] $target
     * @return Boolean
     */
    function findRotation($mat, $target) {
        $c=array_fill(0,4,true);
        $len=count($mat);
        for($i=0;$i<$len;$i++){
            for($j=0;$j<$len;$j++){
                if($mat[$i][$j]!=$target[$i][$j]) $c[0]=false;
                if($mat[$i][$j]!=$target[$len-$j-1][$i]) $c[1]=false;
                if($mat[$i][$j]!=$target[$len-$i-1][$len-$j-1]) $c[2]=false;
                if($mat[$i][$j]!=$target[$j][$len-$i-1]) $c[3]=false;
            }   
        }
        return $c[0]||$c[1]||$c[2]||$c[3];
    }
}
?>