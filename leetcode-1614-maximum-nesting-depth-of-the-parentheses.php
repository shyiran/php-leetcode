<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxDepth(string $s):int {
        $left=0;
        $max=0;
        for($i=0;$i<strlen($s);$i++){
            if($s[$i]=='('){
                $left++;
            }
            if($s[$i]==')'){
                $left--;
            }
            $max=max($max,$left);
        }
        return $max;
    }
}
?>