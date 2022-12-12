<?php
class Solution {
    function maxProfit($prices) {
        $total_profit=0;
        for($i=1;$i<=count($prices);$i++)
        {
        $now_profit=$prices[$i]-$prices[$i-1];
        $now_profit>0?$total_profit+=$now_profit:0;
        }
        return $total_profit;
    }
}