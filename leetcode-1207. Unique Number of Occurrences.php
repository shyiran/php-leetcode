<?php
class Solution {
    function uniqueOccurrences($arr) {
        $arr=array_count_values($arr);
        return $arr==array_unique($arr);
    }
}