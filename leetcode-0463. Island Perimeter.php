class Solution {

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function islandPerimeter($grid) {
    $round=0;
    for($i=0;$i<count($grid);$i++){
        for($j=0;$j<count($grid[$i]);$j++){
            if($grid[$i][$j]==1){
                if($grid[$i-1][$j]==null || $grid[$i-1][$j]==0){
                      $round++;  
                }
                if($grid[$i][$j-1]==null || $grid[$i][$j-1]==0){
                      $round++; 
                }
                if($grid[$i+1][$j]==null || $grid[$i+1][$j]==0){
                      $round++; 
                }
                if($grid[$i][$j+1]==null || $grid[$i][$j+1]==0){
                      $round++; 
                }
            }
        }
    }
    return $round;
}
}