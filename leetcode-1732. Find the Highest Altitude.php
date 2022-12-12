class Solution {

/**
 * @param Integer[] $gain
 * @return Integer
 */
function largestAltitude($gain) {
    $max=0;
    $now=0;
    for($i=0;$i<count($gain);$i++){
        $now += $gain[$i];
        $max=max($now,$max);
    }
    return $max;
}
}