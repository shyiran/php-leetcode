class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function trailingZeroes($n) {
    $num=0;
    while($n/5>=1){
        $num+=(int)($n/5);
        $n=(int)($n/5);
    }
    return $num;
}
}