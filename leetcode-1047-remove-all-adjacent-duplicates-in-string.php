class Solution {

/**
 * @param String $s
 * @return String
 */
function removeDuplicates($s) {
    $stack=[];
    for($i=0;$i<strlen($s);$i++){
        if(end($stack)==$s[$i]){
            array_pop($stack);
        }
        else{
           $stack[]=$s[$i]; 
        }
    }
    return join($stack);
    }
}