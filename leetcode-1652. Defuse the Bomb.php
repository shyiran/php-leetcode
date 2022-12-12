class Solution {

/**
 * @param Integer[] $code
 * @param Integer $k
 * @return Integer[]
 */
function decrypt($code, $k) {
    $total=0;
    $len=count($code);
    for($i=1;$i<=abs($k);$i++){
        if($k<0){
            $total += $code[$len+$k+$i-1];
        }
        else{
            $total += $code[$i];   
        }
    }
    $arr=[$total];
    for($i=1;$i<$len;$i++){
        if($k<0){
            $total-=$code[($len+$k+$i-1)%$len];
            $total+=$code[$i-1];
        }
        elseif($k==0){
            $total = 0;
        }
        else{
            $total += $code[($i+$k)%$len];
            $total -= $code[$i];   
        }
        $arr[]=$total;
    }
    return $arr;
}
}