<?php 
class Solution {

    /**
     * @param Integer[] $position
     * @return Integer
     */
    function minCostToMoveChips($position) {
        $even=0;
        $odd=0;
        for($i=0;$i<count($position);$i++){
            if($position[$i]%2==0){
                $even++;
            }
            else{
                $odd++;
            }
        }
        return min($odd,$even);
    }
}
?>