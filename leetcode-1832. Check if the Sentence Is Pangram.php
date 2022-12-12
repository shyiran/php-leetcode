<?php
class Solution {

    /**
     * @param String $sentence
     * @return Boolean
     */
    function checkIfPangram($sentence) {
        $hash=[];
        for($i=0;$i<strlen($sentence);$i++){
            $hash[$sentence[$i]]=true;
        }
        return count($hash)==26;
    }
}
?>