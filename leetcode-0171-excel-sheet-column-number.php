<?php
class Solution {

    /**
     * @param String $columnTitle
     * @return Integer
     */
    function titleToNumber($columnTitle) {
        $ASCII=[];
        $ans=0;
        $multi=1;
        for($i=ord('a');$i<=ord('z');$i++){
            $ASCII[strtoupper(chr($i))]=$i-96;
        }
        for($j=strlen($columnTitle)-1;$j>=0;$j--){
            $ans+=$ASCII[$columnTitle[$j]]*$multi;
            $multi*=26;
        }
        return $ans;
    }
}
?>