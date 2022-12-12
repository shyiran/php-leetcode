class Solution {

/**
 * @param Integer[][] $points
 * @param Integer[][] $queries
 * @return Integer[]
 */
function countPoints($points, $queries) {
    $arr=[];
    foreach($queries as $query){
        $nums=0;
        $x1=$query[0];
        $y1=$query[1];
        foreach($points as $point){
           $x2=$point[0];
           $y2=$point[1];
           $s1=($x1-$x2)*($x1-$x2);
           $s2=($y1-$y2)*($y1-$y2);
           if(sqrt(abs($s1)+abs($s2))<=$query[2]){
               $nums++;
           }
        }
        $arr[]=$nums;
    }
    return $arr;
}
}