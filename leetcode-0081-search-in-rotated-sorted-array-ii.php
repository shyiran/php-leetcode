### 81. 搜索旋转排序数组 II

# 题目
已知存在一个按非降序排列的整数数组 nums ，数组中的值不必互不相同。

在传递给函数之前，nums 在预先未知的某个下标 k（0 <= k < nums.length）上进行了 旋转 ，
使数组变为 [nums[k], nums[k+1], ..., nums[n-1], nums[0], nums[1], ..., nums[k-1]]（下标 从 0 开始 计数）。
例如， [0,1,2,4,4,4,5,6,6,7] 在下标 5 处经旋转后可能变为 [4,5,6,6,7,0,1,2,4,4] 。

给你旋转后的数组 nums 和一个整数 target ，请你编写一个函数来判断给定的目标值是否存在于数组中。
如果 nums 中存在这个目标值 target ，则返回 true ，否则返回 false 。

你必须尽可能减少整个操作步骤。

https://leetcode-cn.com/problems/search-in-rotated-sorted-array-ii

提示：
- 1 <= nums.length <= 5000
- -10<sup>4</sup> <= nums[i] <= 10<sup>4</sup>
- 题目数据保证 nums 在预先未知的某个下标上进行了旋转
- -10<sup>4</sup> <= target <= 10<sup>4</sup>


# 示例
```
输入：nums = [2,5,6,0,0,1,2], target = 0
输出：true
```
```
输入：nums = [2,5,6,0,0,1,2], target = 3
输出：false
```


# 解析

##### 二分查找

&emsp;&emsp;对于数组中有重复元素的情况，二分查找时可能会有 a[l]=a[mid]=a[r]，此时无法判断区间 [l,mid] 和区间 [mid+1,r] 哪个是有序的。

&emsp;&ems;例如 nums=[3,1,2,3,3,3,3]，target=2，首次二分时无法判断区间 [0,3] 和区间 [4,6] 哪个是有序的。

&emsp;&emsp;对于这种情况，只能将当前二分区间的左边界加一，右边界减一，然后在新区间上继续二分查找。

# 代码

```php
$arg = [2,5,6,0,0,1,2]; $target = 7;
(new LeetCode0283)->main($arg, $target);

class LeetCode0081
{
    function main($arg, $target)
    {
        var_dump($this->search($arg, $target));
    }

    function search($nums, $target)
    {
        $n = count($nums);
        if ($n == 0)
            return false;
        if ($n == 1)
            return $nums[0] == $target;
        $left = 0;
        $right = $n - 1;
        while ($left <= $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($nums[$mid] == $target) {
                return true;
            }
            if ($nums[$left] == $nums[$mid] && $nums[$mid] == $nums[$right]) {
                ++$left;
                --$right;
            } else if ($nums[$left] <= $nums[$mid]) {
                if ($nums[$left] <= $target && $target < $nums[$mid]) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } else {
                if ($nums[$mid] < $target && $target <= $nums[$n - 1]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
        }
        return false;
    }

}
```