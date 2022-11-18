<?php
/*
20. 有效的括号
简单
3.6K
相关企业

给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串 s ，判断字符串是否有效。

有效字符串需满足：

    左括号必须用相同类型的右括号闭合。
    左括号必须以正确的顺序闭合。
    每个右括号都有一个对应的相同类型的左括号。



示例 1：

输入：s = "()"
输出：true

示例 2：

输入：s = "()[]{}"
输出：true

示例 3：

输入：s = "(]"
输出：false

提示：

    1 <= s.length <= 104
    s 仅由括号 '()[]{}' 组成
https://leetcode.cn/problems/valid-parentheses/
*/

class Solution20
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid(string $s): bool {
        $map = [ '(' => ')', '{' => '}', '[' => ']' ];
        $stack = new SplStack();                    //存储左括号的栈
        $len = strlen ($s);                         //字符串长度
        for ($i = 0; $i < $len; $i++) {
            if (isset($map[$s[$i]])) {              //左括号入栈
                $stack->push ($s[$i]);
            } else {                                //右括号，2种情况判断
                if ($stack->isEmpty () || $map[$stack->pop ()] != $s[$i]) {
                    return false;
                }
            }
        }
        return $stack->isEmpty ();//返回时，判断栈是否为空
    }
}
