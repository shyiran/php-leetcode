<?php
/*
017. 给定一个仅包含数字 2-9 的字符串，返回所有它能表示的字母组合。答案可以按 任意顺序 返回。

给出数字到字母的映射如下（与电话按键相同）。注意 1 不对应任何字母。



提示：

- 0 <= digits.length <= 4
- digits[i] 是范围 ['2', '9'] 的一个数字。

# 示例：

```
输入：digits = "23"
输出：["ad","ae","af","bd","be","bf","cd","ce","cf"]
```

```
输入：digits = ""
输出：[]
```

```
输入：digits = "2"
输出：["a","b","c"]
```

# 解析

要解决如下三个问题：

- 数字和字母如何映射？
- 两个字母就是两层循环，三个字母就是三层，以此类推，会发现代码根本写不出来
- 输入 1、*、# 按键等一场情况

第一个问题，可以使用 map 或者定义一个二维数来实现映射。

第二个问题，遍历的深度，也就是输入字符串的长度，而叶子节点即视要收集的结果。

第三个问题，异常情况不讨论了

确定递归函数的参数：首先需要一个字符串来收集叶子节点的结果，保存在结果集 result 中。其他的参数，一个是需要处理的字符串，一个是 int 的 index。

确定终止条件：如果 index 等于输入的数字个数，那么收集结果，结束本层递归。

确定单层遍历逻辑：首先获取下标 index 指向的数字，并找到对应的字符集，然后用循环处理这个字符集

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

class LeetCode0017
{
    public $map = [
        '',     //0
        '',     //1
        'abc',  //2
        'def',  //3
        'ghi',  //4
        'jkl',  //5
        'mno',  //6
        'pqrs', //7
        'tuv',  //8
        'wxyz', //9
    ];

    public $res = [];
    public $path = '';

    public function letterCombinations($digits)
    {
        if (!$digits) {
            return [];
        }
        $this->_backTracking($digits, 0);
        return $this->res;
    }

    protected function _backTracking($digits, $idx)
    {
        if (strlen($this->path) == strlen($digits)) {
            $this->res[] = $this->path;
            return;
        }
        $num = $digits[$idx];
        $letters = $this->map[$num];
        for ($i = 0; $i < strlen($letters); $i++) {
            $this->path .= $letters[$i];
            $this->_backTracking($digits, $idx + 1);
            $this->path = substr($this->path, 0, strlen($this->path) - 1);
        }

    }
}


