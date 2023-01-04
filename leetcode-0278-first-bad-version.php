### 278. 第一个错误的版本

# 题目
你是产品经理，目前正在带领一个团队开发新的产品。不幸的是，你的产品的最新版本没有通过质量检测。由于每个版本都是基于之前的版本开发的，
所以错误的版本之后的所有版本都是错的。

假设你有 n 个版本 [1, 2, ..., n]，你想找出导致之后所有版本出错的第一个错误的版本。

你可以通过调用 bool isBadVersion(version) 接口来判断版本号 version 是否在单元测试中出错。
实现一个函数来查找第一个错误的版本。你应该尽量减少对调用 API 的次数。

https://leetcode-cn.com/problems/first-bad-version

提示：
- 1 <= bad <= n <= 2<sup>31</sup> - 1

# 示例
```
输入：n = 5, bad = 4
输出：4
解释：
调用 isBadVersion(3) -> false 
调用 isBadVersion(5) -> true 
调用 isBadVersion(4) -> true
所以，4 是第一个错误的版本。
```
```
输入：n = 1, bad = 1
输出：1
```


# 解析

##### 二分查找

&emsp;&emsp;因为题目要求尽量减少调用检查接口的次数，所以不能对每个版本都调用检查接口，而是应该将调用检查接口的次数降到最低。

&emsp;&emsp;注意到一个性质：当一个版本为正确版本，则该版本之前的所有版本均为正确版本；当一个版本为错误版本，则该版本之后的所有版本均为错误版本。
可以利用这个性质进行二分查找。

&emsp;&emsp;具体地，将左右边界分别初始化为 1 和 n，其中 n 是给定的版本数量。设定左右边界之后，每次都依据左右边界找到其中间的版本，
检查其是否为正确版本。如果该版本为正确版本，那么第一个错误的版本必然位于该版本的右侧，就缩紧左边界；否则第一个错误的版本必然位于该版本及该版本的左侧，
就缩紧右边界。

&emsp;&emsp;这样每判断一次都可以缩紧一次边界，而每次缩紧时两边界距离将变为原来的一半，因此至多只需要缩紧 O(logn) 次。

# 代码
```php
/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $left  = 1;
        $right = $n;
        while ($left < $right) { // 循环直至区间左右端点相同
            $mid = $left + (($right - $left) >> 1); // 防止计算时溢出
            if ($this->isBadVersion($mid)) {
                $right = $mid; // 答案在区间 [left, mid] 中
            } else {
                $left = $mid + 1; // 答案在区间 [mid+1, right] 中
            }
        }
        // 此时有 left == right，区间缩为一个点，即为答案
        return $left;

    }
}
```