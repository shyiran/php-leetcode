### 704. 二分查找

# 题目
给定一个 n 个元素有序的（升序）整型数组 nums 和一个目标值 target  ，
写一个函数搜索 nums 中的 target，如果目标值存在返回下标，否则返回 -1。

https://leetcode-cn.com/problems/binary-search/

# 示例
```
输入: nums = [-1,0,3,5,9,12], target = 9
输出: 4
解释: 9 出现在 nums 中并且下标为 4
```
```
输入: nums = [-1,0,3,5,9,12], target = 2
输出: -1
解释: 2 不存在 nums 中因此返回 -1
```

提示：
- 你可以假设 nums 中的所有元素是不重复的。
- n 将在 [1, 10000]之间。
- nums 的每个元素都将在 [-9999, 9999]之间。

# 解析
&emsp;&emsp;二分法虽然逻辑比较简单，但实际很多边界条件，很容易写错。比如，while 的是 left<right，还是 left<=right ？
到底是 right=middle 还是 right=middle-1 呢？

&emsp;&emsp;写错的原因主要是不清楚区间的定义，区间定义就是“不变量”。要在二分查找的过程中保持“不变量”——在 while 循环中，
每一次边界的处理都根据区间的定义来操作，这就是“循环不变量”规则。

&emsp;&emsp;二分法中区间的定义一般有两种，即左闭右闭 [left,right] 和 左闭右开 [left, right)。

&emsp;&emsp;如果定义 target 在一个左闭右闭的区间 [left,right]，有如下两点：
- 因为 left 与 right 相等的情况在 [left, right] 区间是有意义的，所以在 while 中要使用 left<=right。
- 如果 nums[middle]>target，则更新搜索范围右下标 right 为 middle-1。因为当前这个 nums[middle] 一定不是 target，
所以接下来要查找的右区间下标位置为 middle-1。

&emsp;&emsp;如果定义 target 在一个左闭右开的区间 [left,right)，二分法边界处理方式的不同体现在以下两点：
- while 里 left<right，用的“<”是因为 left==right 的时候在 [left,right) 区间是没有意义的。
- 如果 nums[middle]>target，则更新搜索范围右下标 right=middle。因为当前 nums[middle]!=target，那么去左区间继续寻找，
而寻找的区间是左闭右开区间，所以 right 更新为 middle，即在下一个查询区间不会比较 nums[middle]。


# 代码
```php
$nums = [-1,0,3,5,9,12];
$target = 9;
$target = 2;

//$nums = [5];
//$target = 5;
print_r((new LeetCode0704())->search($nums, $target));

class LeetCode0704
{
    function search($nums, $target)
    {
        $i = 0;
        $j = count($nums) - 1;
        while($i <= $j) {
            $mid = intval(($j - $i) / 2) + $i;
            if ($nums[$mid] == $target) {
                return $mid;
            } else if ($nums[$mid] < $target) {
                $i = $mid + 1;
            } else if ($nums[$mid] > $target) {
                $j = $mid - 1;
            }
        }
        return -1;

    }

}
```
