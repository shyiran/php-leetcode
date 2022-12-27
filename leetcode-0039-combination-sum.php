<?php
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combo($candidates,$i,$target,$cur,&$ans){
        if($target==0){
            $ans[]=$cur;
            return ;
        }
        if($target<0 || $i>=count($candidates))return ;
        
        for($j=$i;$j<count($candidates);$j++){
            $cur[]=$candidates[$j];
            $this->combo($candidates,$j,$target-$candidates[$j],$cur,$ans);
            array_pop($cur);
        }
    }
    function combinationSum($candidates, $target) {
        $ans=[];
        $this->combo($candidates,0,$target,[],$ans);
        return $ans;
    }
}
?>