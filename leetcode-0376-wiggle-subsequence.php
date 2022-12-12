### 376. 摆动序列

# 题目
如果连续数字之间的差严格地在正数和负数之间交替，则数字序列称为 摆动序列 。
第一个差（如果存在的话）可能是正数或负数。仅有一个元素或者含两个不等元素的序列也视作摆动序列。

例如， [1, 7, 4, 9, 2, 5] 是一个 摆动序列 ，因为差值 (6, -3, 5, -7, 3) 是正负交替出现的。

相反，[1, 4, 7, 2, 5] 和 [1, 7, 4, 5, 5] 不是摆动序列，第一个序列是因为它的前两个差值都是正数，第二个序列是因为它的最后一个差值为零。
子序列 可以通过从原始序列中删除一些（也可以不删除）元素来获得，剩下的元素保持其原始顺序。

给你一个整数数组 nums ，返回 nums 中作为 摆动序列 的 最长子序列的长度 。

https://leetcode-cn.com/problems/wiggle-subsequence/

# 示例：
```
输入：nums = [1,7,4,9,2,5]
输出：6
解释：整个序列均为摆动序列，各元素之间的差值为 (6, -3, 5, -7, 3) 。
```

```
输入：nums = [1,17,5,10,13,15,10,5,16,8]
输出：7
解释：这个序列包含几个长度为 7 摆动序列。
其中一个是 [1, 17, 10, 13, 10, 16, 8] ，各元素之间的差值为 (16, -7, 3, -3, 6, -8) 。
```

```
输入：nums = [1,2,3,4,5,6,7,8,9]
输出：2
```


提示：
- 1 <= nums.length <= 1000
- 0 <= nums[i] <= 1000

# 解析

##### 贪心

&emsp;&emsp;本题要求通过从原始序列删除一些（也可以不删除）元素来获得子序列，剩下的元素保持其原始顺序——既要求最大暴动序列，又需要修改数组。

&emsp;&emsp;应该删除什么元素呢？以示例 2 的输入为例，需要删除的元素如下图

&emsp;&emsp;![image](http://dfs.cricbigdata.com/view/fd48893635d366d0bab4c50e50a8049a46ae93d2.png)

&emsp;&emsp;局部最优：删除单调坡度上的节点（不包括单调坡度两端的节点），这个坡度就可以有两个局部峰值。

&emsp;&emsp;全局最优：整个序列有最多的局部峰值，从而获得最长摆动序列。

&emsp;&emsp;通过局部最优推出全局最优，并举不出反例，可以试试贪心算法。

&emsp;&emsp;在实际操作种能，其实连删除的操作都不用做，因为要求的是最长摆动子序列的长度，所以只需要统计数组的峰值数量就可以了。

&emsp;&emsp;在代码实现中，统计峰值的时候，数组的最左面和最右面是最不好统计的。例如序列 [2, 5]，它的峰值数量是2，
如果靠通国际差值来计算峰值的个数，那么就需要考虑数组最左面和最右面的特殊情况。

&emsp;&emsp;针对序列 [2, 5]，可以假设其为 [2, 2, 5]，这样就有坡度了，即 preDiff=0。如下图：

&emsp;&emsp;![image](http://dfs.cricbigdata.com/view/b569dd8939cbc3db7e020dc259debddf5cb23302.png)

&emsp;&emsp;针对以上情形，result 的初始值为 1（默认最右面有一个峰值），此时 curDiff 大于 0，同时 preDiff 小于或等于0，
那么执行 result++ （计算左面的峰值）后得到的 result 就是 2 （峰值的个数为 2，即摆动序列的长度为 2）。

https://leetcode.cn/problems/wiggle-subsequence/
# 代码
```php
$nums = [1,17,5,10,13,15,10,5,16,8];
(new LeetCode0376())->main($nums);

class LeetCode0376
{
    public function main($nums)
    {
        echo $this->wiggleMaxLength($nums);
    }

    function wiggleMaxLength($nums)
    {
        $len = count($nums);
        if ($len <= 1) {
            return $len;
        }
        $curDiff = 0;       // 当前一对差值
        $preDiff = 0;       // 前一对差值
        $res = 1;           // 记录峰值的个数，默认序列最右边有一个峰值
        for ($i = 0; $i < $len - 1; $i++) {
            $curDiff = $nums[$i + 1] - $nums[$i];
            // 出现峰值
            if (($curDiff > 0 && $preDiff <= 0) || ($preDiff >= 0 && $curDiff < 0)) {
                $res++;
                $preDiff = $curDiff;
            }
        }
        return $res;
    }
}
```