/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function checktree($root1,$root2){
        if($root1 == null && $root2 == null) return true;
        if($root1 == null || $root2 == null) return false;
        return ($root1->val == $root2->val)
            &&$this->checktree($root1->right,$root2->left)
            &&$this->checktree($root1->left,$root2->right);
    }
    function isSymmetric($root) {
        return $this->checktree($root,$root);
    }
}