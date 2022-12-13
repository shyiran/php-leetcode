<?php
class Solution {

    /**
     * @param String[] $words
     * @return String
     */
    function checkPalindromic($s,$i,$j){
        if($i>=$j){
            return true;
        }else{
            if($s[$i]==$s[$j]){
                return $this->checkPalindromic($s,$i+1,$j-1);
            }else{
                return false;
            }
        }
    } 
    function firstPalindrome($words) {
        for($i=0;$i<count($words);$i++){
            if($this->checkPalindromic($words[$i],0,strlen($words[$i])-1)){
                return $words[$i];
            }
        }
        return "";
    }
}
?>