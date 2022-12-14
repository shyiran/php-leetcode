<?php
class Solution {
    function maxDistToClosest($seats) {
        $left=0; $right=count($seats);
        while($seats[$left]==0)$left++;
        while($seats[$right]==0)$right--;
        $ans=max($left,count($seats)-$right-1);
        $last_left=$left++;
        while($left<=$right)
        {
            ($seats[$left]==1)?($ans=max($ans,floor(($left-$last_left)/2))).($last_left=$left):null;
            $left++;
        }
        return $ans;
    }
}