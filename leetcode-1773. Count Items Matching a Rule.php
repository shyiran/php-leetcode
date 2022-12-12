<?php
class Solution {

/**
 * @param String[][] $items
 * @param String $ruleKey
 * @param String $ruleValue
 * @return Integer
 */
function countMatches($items, $ruleKey, $ruleValue) {
    $case=false;
    $count=0;
    switch($ruleKey){
        case 'type':
            $case=0;
            break;
        case 'color':
            $case=1;
            break;
        case 'name':
            $case=2;
            break;
    }
    foreach($items as $item){
        if($item[$case]==$ruleValue){
            $count++;
        }
    }
    return $count;
}
}
?>