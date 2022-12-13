<?php
class Solution {

/**
 * @param String $s
 * @return Boolean
 */
function areOccurrencesEqual($s) {
    $hash=[];
    for($i=0;$i<strlen($s);$i++){
        if(isset($hash[$s[$i]])){
            $hash[$s[$i]]++;
        }
        else{
            $hash[$s[$i]]=1;
        }
    }
    $before="";
    $status=true;
    foreach($hash as $value){
        if($before!=$value && $before!=""){
            $status=false;
        }
        else{
            $before=$value;
        }
    }
    return $status;
}
}
?>