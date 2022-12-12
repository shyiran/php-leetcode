<?php
class Solution {

    function canJump($nums) {
        for($i=0;$i<count($nums);$i++)
        {
         if ($far<$i) return false;
         $far=max($i+$nums[$i],$far);
        }
        return true;
    }
}