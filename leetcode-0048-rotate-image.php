<?php
class Solution {
    function swap(&$num1,&$num2,&$num3,&$num4){
        $tmp=$num1;
        $num1=$num2;
        $num2=$num3;
        $num3=$num4;
        $num4=$tmp;
    }
    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix) {
        $len=count($matrix);
        for($i=0;$i<ceil($len/2);$i++){
            for($j=0;$j<floor($len/2);$j++){
                $this->swap($matrix[$len-$j-1][$i],$matrix[$len-$i-1][$len-$j-1],$matrix[$j][$len-$i-1],$matrix[$i][$j],);
            }   
        }
        return $matrix;
    }
}
?>