<?php
/*
 * 40. 组合总和 II
中等
1.2K
相关企业

给定一个候选人编号的集合 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。

candidates 中的每个数字在每个组合中只能使用 一次 。

注意：解集不能包含重复的组合。 

 

示例 1:

输入: candidates = [10,1,2,7,6,1,5], target = 8,
输出:
[
[1,1,6],
[1,2,5],
[1,7],
[2,6]
]

示例 2:

输入: candidates = [2,5,2,1,2], target = 5,
输出:
[
[1,2,2],
[5]
]

 

提示:

    1 <= candidates.length <= 100
    1 <= candidates[i] <= 50
    1 <= target <= 30

https://leetcode.cn/problems/combination-sum-ii/
 */
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function dfs($candidates,$target,&$ans,$nowIndex=0,$nowItem=[],$sum=0){
        if($sum>$target) return ;
        if($sum==$target){
            $ans[]=$nowItem;
            return ;
        }
        for($i=$nowIndex;$i<count($candidates);$i++){
            if($i>$nowIndex && $candidates[$i]==$candidates[$i-1]){
                continue;
            }
            $this->dfs($candidates,$target,$ans,$i+1,array_merge($nowItem,[$candidates[$i]]),$sum+$candidates[$i]);
        }
    }
    function combinationSum2($candidates, $target) {
        $ans=[];
        sort($candidates);
        $this->dfs($candidates,$target,$ans);
        return $ans;
    }
}
?>