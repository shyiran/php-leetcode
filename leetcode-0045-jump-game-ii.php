<?php
class Solution {
    function jump($nums) {
        $last_index=0;
        $now_index=0;
        $end=count($nums)-1;
        $count_jump=0;
        for($i=0;$i<$end;$i++)
        {
            $now_index=max($now_index,$i+$nums[$i]);
            if($i==$last_index)
            {
                $last_index=$now_index;
                $count_jump++;
                if($last_index==$end)
                    return $count_jump;
            }
        }
        return $count_jump;
    }
}