<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) {
        $i=strlen($s)-1;
        $j=strlen($t)-1;
        $overs=0;
        $overj=0;
        $sStr="";
        $tStr="";
        while($i>=0 || $j>=0){
            if($i>=0){
                if($s[$i]=='#'){
                    $overs++;
                }else if($overs==0){
                    $sStr.=$s[$i];
                }else{
                    $overs--;
                }
            }
            if($j>=0){
                if($t[$j]=='#'){
                    $overj++;
                }else if($overj==0){
                    $tStr.=$t[$j];
                }else{
                    $overj--;
                }
            }
            $i--;
            $j--;
        }
        return $sStr==$tStr;
    }
}
?>