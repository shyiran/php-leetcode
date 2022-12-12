<?php
class Solution {
    
    function maxProfit($prices) {
        $max_profit=0;
        for($i=1;$i<=count($prices);$i++)
        {
        $now_profit=max(0,$now_profit+$prices[$i]-$prices[$i-1]);
        $max_profit=max($max_profit,$now_profit);
        }
        return $max_profit;
    }
}