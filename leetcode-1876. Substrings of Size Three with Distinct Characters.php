class Solution {

/**
 * @param String $s
 * @return Integer
 */
function countGoodSubstrings($s) {
    $total=0;
    for($i=2;$i<strlen($s);$i++){
        if($s[$i]!=$s[$i-1] && $s[$i-1]!=$s[$i-2] && $s[$i]!=$s[$i-2]){
            $total++;
        }
    }
    return $total;
}
}