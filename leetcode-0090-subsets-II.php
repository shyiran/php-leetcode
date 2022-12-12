<?php
    class Solution {

        /**
         * @param Integer[] $nums
         * @return Integer[][]
         */
        function backtrack($nums,&$ans,$index=0,$sub=[]){
            $ans[]=$sub;
            for($i=$index;$i<count($nums);$i++){
                if($i>$index && $nums[$i]==$nums[$i-1]) continue;
                $sub[]=$nums[$i];
                $this->backtrack($nums,$ans,$i+1,$sub);
                array_pop($sub);
            }    
        }
        function subsetsWithDup($nums) {
            sort($nums);
            $ans=[];
            $this->backtrack($nums,$ans);
            return $ans;
        }
    }
?>