<?php
class Solution {
    function sortArrayByParityII($A) {
        $odd=[];
        $even=[];
        $ans=[];
        for($i=0;$i<count($A);$i++)
            ($A[$i]%2==0)?array_push($even,$A[$i]):array_push($odd,$A[$i]);
        for($i=0;$i<count($A);$i++)
            ($i%2==0)?array_push($ans,$even[floor($i/2)]):array_push($ans,$odd[floor($i/2)]);
        return $ans;
    }
}