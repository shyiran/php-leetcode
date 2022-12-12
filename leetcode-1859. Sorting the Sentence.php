<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function sortSentence($s) {
        $str="";
        $ans="";
        $hash=[];
        for($i=0;$i<strlen($s);$i++){
            if(is_numeric($s[$i])){
                $hash[$s[$i]] = trim($str).' ';
                $str="";
            }else{
                $str.=$s[$i];
            }    
        }
        ksort($hash);
        for($j=0;$j<=count($hash);$j++){
            $ans.=$hash[$j];
        }
        return trim($ans);
    
    }
}
?>