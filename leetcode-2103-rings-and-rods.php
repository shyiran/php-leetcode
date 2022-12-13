<?php
    class Solution {

    /**
     * @param String $rings
     * @return Integer
     */
    function countPoints($rings) {
        $hash=[];
        $count=[];
        for($i=0;$i<strlen($rings)-1;$i+=2){
            $hash[$rings[$i+1]][$rings[$i]]=$rings[$i];
            if(!isset($count[$rings[$i+1]])){
                if(count($hash[$rings[$i+1]])==3){
                    $count[$rings[$i+1]]=true;
                }
            }
            
        }
        return count($count);
    }
    }
?>