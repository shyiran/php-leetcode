class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxProductDifference($nums) {
    $max=0;
    $max_last=0;
    $min=999999;
    $min_last=999999;
    foreach($nums as $value){
        if($value>$max){
            $max_last=$max;
            $max=$value;
        }
        else if($value>$max_last){
            $max_last=$value;
        }
        if($value<$min){
            $min_last=$min;
            $min=$value;
        }
        else if($value<$min_last){
            $min_last=$value;
        }
    }
    return ($max*$max_last-$min*$min_last);
}
}