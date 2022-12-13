<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $l
     * @param Integer[] $r
     * @return Boolean[]
     */
    function check($nums,$left,$right){
        $splice=array_splice($nums,$left,$right-$left+1);
        sort($splice);
        $gap=$splice[1]-$splice[0];
        for($i=1;$i<count($splice)-1;$i++){
            $lastGap=$gap;
            $gap=$splice[$i+1]-$splice[$i];
            if($gap!=$lastGap){
                return false;
                break;
            }
        }
        return true;
    }
    function checkArithmeticSubarrays($nums, $l, $r) {
        $ans=[];
        for($i=0;$i<count($l);$i++){
            $ans[]=$this->check($nums,$l[$i],$r[$i]);
        }
        return $ans;
    }
}
?>