class Solution {

/**
 * @param Integer[] $costs
 * @param Integer $coins
 * @return Integer
 */
function maxIceCream($costs, $coins) {
    $nums=0;
    sort($costs);
    for($i=0;$i<count($costs);$i++){
        if(($coins-$costs[$i])>=0){
            $coins-=$costs[$i];
            $nums++;
        }
        else{
            break;
        }
    }
    return $nums;
}
}