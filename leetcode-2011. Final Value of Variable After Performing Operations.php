class Solution {

/**
 * @param String[] $operations
 * @return Integer
 */
function finalValueAfterOperations($operations) {
    $nums=0;
    foreach($operations as $value){
        if($value[1]=="-"){
            $nums--;
        }
        else{
            $nums++;
        }
    }
    return $nums;
}
}