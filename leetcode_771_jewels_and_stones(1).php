<?php
/*
771. 宝石与石头
给定字符串J 代表石头中宝石的类型，和字符串 S代表你拥有的石头。 S 中每个字符代表了一种你拥有的石头的类型，你想知道你拥有的石头中有多少是宝石。

J 中的字母不重复，J 和 S中的所有字符都是字母。字母区分大小写，因此"a"和"A"是不同类型的石头。

示例 1:
输入: J = "aA", S = "aAAbbbb"
输出: 3

示例 2:
输入: J = "z", S = "ZZ"
输出: 0

注意:
S 和 J 最多含有50个字母。
J 中的字符不重复。

分析：从第二个参数S中找第一个参数J 中出现的字符，返回找到的字符个数。

也就是说，第一个参数J是一个需要找的字符的列表。只是拼接成字符串了。
而第二个参数S是被查找的字符串。
简单地说就是要在S里找J。

先把问题简化为J中只有一个字符的情形，因为字符串可以看作是一个字符数组。
首先想到的是用array_filter。可能很多人没听说过这个函数。
这个函数的作用就是，根据闭包函数，过滤数组元素。
简单地说就是删除不需要的元素。

要注意$S是字符串，需要先转换成数组才行。
我们可以写出这样的代码：
$values = array_filter(str_split($S), function($val) use ($J){
    return $val == $J;
});

此时再延伸一下判断条件：
$values = array_filter(str_split($S),function($var) use ($J){
    if(in_array($var, str_split($J))){
        return $var;
    }
});

最后返回count($values)即可。


著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
https://leetcode-cn.com/problems/jewels-and-stones/

*/

$J = "aA"; $S = "aAAbbbb";
var_dump((new Solution771())->numJewelsInStones($J, $S));

class Solution771 {
    function numJewelsInStones($J, $S) {
        $keys = array_filter(str_split($S),function($var) use ($J){
            if(in_array($var,str_split($J))){
                return $var;
            }
        });
        return count($keys);
    }
}
