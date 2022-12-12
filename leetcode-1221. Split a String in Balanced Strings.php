<?php
class Solution {
    function balancedStringSplit($s) {
        $count_RL=0;
        $now_RL=0;
        for($i=0;$i<strlen($s);$i++)
        {
            ($s[$i]=="R")?$now_RL++:$now_RL--;
            if($now_RL==0) $count_RL++;
        }
        return $count_RL;
    }
}