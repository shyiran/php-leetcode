<?php
class Solution {

/**
 * @param String[] $strs
 * @return String[][]
 */
function groupAnagrams($strs) {
    $hash=[];
    $ans=[];
    for ($x=ord('a');$x<=ord('z');$x++) {
        $chr[chr($x)]=1;
    }
    
    for($i=0;$i<count($strs);$i++){
        $newChr=$chr;
        for($j=0;$j<strlen($strs[$i]);$j++){
            $newChr[$strs[$i][$j]]++;
        }
        $strChr=implode($newChr);
        if(isset($hash[$strChr])){
            $hash[$strChr][]=$strs[$i];
        }else{
            $hash[$strChr]=[$strs[$i]];   
        }
        echo $strChr."\n";
    }
    return $hash;
}
}
?>