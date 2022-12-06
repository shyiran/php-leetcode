### 738. 单调递增的数字

# 题目
给定一个非负整数 N，找出小于或等于 N 的最大的整数，同时这个整数需要满足其各个位数上的数字是单调递增。
（当且仅当每个相邻位数上的数字 x 和 y 满足 x <= y 时，我们称这个整数是单调递增的。）

https://leetcode-cn.com/problems/monotone-increasing-digits/

# 示例:
```
输入: N = 10
输出: 9
```

# 示例
```
输入: N = 1234
输出: 1234
```


```
输入: N = 332
输出: 299
```

说明: N 是在 [0, 10^9] 范围内的一个整数。


# 解析

##### 贪心
&emsp;&emsp;局部最优：一旦出现 num[i-1]>num[i] 的情况，首先将num[i-1]减一，然后将num[i]赋值为9，可以将这两个数变成最大单调递增的整数。

&emsp;&emsp;全局最优：得到小于等于N的最大单调递增的整数

&emsp;&emsp;但根据局部最优推出全局最优，还需要其他条件，即遍历顺序和标记从哪一位开始统一改成9。

&emsp;&emsp;如果是从前向后遍历，遇到 num[i-1]>num[i] 的情况，将 num[i-1] 减一，此时可能出现 num[i-1] 又小于 num[i-2]的情况。
例如332，先改成329，此时2又小于第一位的3，真正的结果应该是299。

&emsp;&emsp;从后向前遍历就可以重复利用上次比较得出的结果了。例如332的数值变化为：332、329、299
https://leetcode.cn/problems/monotone-increasing-digits/
# 代码
```php
$N = 332;
$o = new Solution738();
$o->main($N);

class Solution738
{
    public function main($n)
    {
        echo $this->monotoneIncreasingDigits1($n) . PHP_EOL;
        echo $this->monotoneIncreasingDigits2($n) . PHP_EOL;
    }

    // 暴力解法 时间复杂度O(n×m)，m为数字n的长度
    function monotoneIncreasingDigits1($n)
    {
        function checkNum($num) {
            $max = 10;
            while ($num) {
                $t = $num % 10;
                if ($max >= $t) {
                    $max = $t;
                } else {
                    return false;
                }
                $num = intval($num / 10);
            }
            return true;
        }
        for($i = $n; $i > 0; $i--) {
            if (checkNum($i)) {
                return $i;
            }
        }
        return 0;
    }

    function monotoneIncreasingDigits2($n)
    {
        // flag 用来标记赋值9从哪里开始
        // 设置为默认值，为了放置再flag没有被赋值的情况下执行第二个for循环
        $n = strval($n);
        $len = strlen($n);
        $flag = $len;
        for ($i = $len - 1; $i > 0; $i--) {
            if ($n[$i - 1] > $n[$i]) {
                $flag = $i;
                $n[$i - 1] = $n[$i - 1] - 1;
            }
        }
        for ($i = $flag; $i < $len; $i++) {
            $n[$i] = '9';
        }
        return intval($n);
    }
}
```