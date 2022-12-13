<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function arraySign($nums) {
        $negavite=0;
        for($i=0;$i<count($nums);$i++){
            if($nums[$i]<0){
                $negavite++;
            }elseif($nums[$i]==0){
                return 0;
            }
        }
        return ($negavite%2==0)?1:-1;
    }
}
?>