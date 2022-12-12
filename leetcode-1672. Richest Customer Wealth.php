<?php
class Solution {

/**
 * @param Integer[][] $accounts
 * @return Integer
 */
function maximumWealth($accounts) {
    $ans=0;
    for($i=0;$i<count($accounts);$i++){
         $sum=0;
        for($j=0;$j<count($accounts[$i]);$j++){
            $sum+=$accounts[$i][$j];
        }    
        ($sum>$ans)?$ans=$sum:null;
    }
    return $ans;
}
}
?>