<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        if(count($nums)<2){
            return 0;
        }else{
           $count=0;
           for($i=1;$i<count($nums);$i++){
               if($nums[$i]<=$nums[$i-1]){
                   $count+=$nums[$i-1]-$nums[$i]+1;
                   $nums[$i]=$nums[$i-1]+1;
               }
           } 
           return $count;
        }
    }
}
?>