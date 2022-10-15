<?php
/*
513. 找树左下角的值
给定一个二叉树的 根节点 root，请找出该二叉树的 最底层 最左边 节点的值。
假设二叉树中至少有一个节点。

示例 1:
输入: root = [2,1,3]
输出: 1

示例 2:
输入: [1,2,3,4,null,5,6,null,null,7]
输出: 7


提示:

二叉树的节点个数的范围是 [1,104]
-2^31 <= Node.val <= 2^31 - 1

*/

require_once '../class/TreeNode.class.php';

$arr = [1,2,3,4,null,5,6,null,null,7];
$root = generateTreeByArray($arr);
var_dump((new Solution513())->main($root));

class Solution513
{

    // BFS，更新当前行的第一个元素
    public function main($root)
    {
        $queue = new SplQueue();
        $queue->enqueue($root);
        $res = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0 ; $i < $size; $i++) {
                $cur = $queue->dequeue();
                if ($i == 0) {
                    $res = $cur->val;
                }
                $cur->left != null && $queue->enqueue($cur->left);
                $cur->right != null && $queue->enqueue($cur->right);
            }
        }
        return $res;
    }


}
