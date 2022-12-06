### 167. 两数之和 II - 输入有序数组

# 题目
给你一个下标从 1 开始的整数数组numbers ，该数组已按 非递减顺序排列 ，请你从数组中找出满足相加之和等于目标数 target 的两个数。
如果设这两个数分别是 numbers[index1] 和 numbers[index2] ，则 1 <= index1 < index2 <= numbers.length 。

以长度为 2 的整数数组 [index1, index2] 的形式返回这两个整数的下标 index1 和 index2。

你可以假设每个输入 只对应唯一的答案 ，而且你 不可以 重复使用相同的元素。

你所设计的解决方案必须只使用常量级的额外空间。

https://leetcode-cn.com/problems/two-sum-ii-input-array-is-sorted

提示：
- 2 <= numbers.length <= 3 * 10<sup>4</sup>
- -1000 <= numbers[i] <= 1000
- numbers 按 非递减顺序 排列
- -1000 <= target <= 1000
- 仅存在一个有效答案

# 示例
```
输入：numbers = [2,7,11,15], target = 9
输出：[1,2]
解释：2 与 7 之和等于目标数 9 。因此 index1 = 1, index2 = 2 。返回 [1, 2] 。
```
```
输入：numbers = [2,3,4], target = 6
输出：[1,3]
解释：2 与 4 之和等于目标数 6 。因此 index1 = 1, index2 = 3 。返回 [1, 3] 。
```


# 解析

#### 二分查找

&emsp;&emsp;在数组中找到两个数，使得它们的和等于目标值，可以首先固定第一个数，然后寻找第二个数，第二个数等于目标值减去第一个数的差。
利用数组的有序性质，可以通过二分查找的方法寻找第二个数。为了避免重复寻找，在寻找第二个数时，只在第一个数的右侧寻找。

#### 对撞指针

&emsp;&emsp;初始时两个指针分别指向第一个元素位置和最后一个元素的位置。每次计算两个指针指向的两个元素之和，并和目标值比较。
如果两个元素之和等于目标值，则发现了唯一解。如果两个元素之和小于目标值，则将左侧指针右移一位。如果两个元素之和大于目标值，则将右侧指针左移一位。
移动指针之后，重复上述操作，直到找到答案。


# 代码
```php
$numbers = [2,7,11,15]; $target = 9;
(new LeetCode0167)->main($numbers, $target);

class LeetCode0167 {
    public function main($numbers, $target) {
        return $this->twoSum($numbers, $target);
    }
    
    // 二分搜索
    public function twoSum($numbers, $target) {
        for ($i = 0, $len = count($numbers); $i < $len; $i++) {
            $low = $i + 1;
            $high = $len - 1;
            while ($low <= $high) {
                $mid = $low + (($high - $low) >> 1);
                if ($numbers[$mid] == $target - $numbers[$i]) {
                    return [$i + 1, $mid + 1];
                } else if ($numbers[$mid] > $target - $numbers[$i]) {
                    $high = $mid - 1;
                } else {
                    $low = $mid + 1;
                }
            }
        }
        return [-1, -1];
    }
    
    // 对撞指针
    public function twoSum2($numbers, $target) {
        $i = 0;
        $j = count($numbers) - 1;
        $return = [];
        while ($i < $j) {
            if ($numbers[$i] + $numbers[$j] == $target) {
                $return = [$i + 1, $j + 1];
                break;
            } elseif ($numbers[$i] + $numbers[$j] > $target) {
                $j--;
            } else {
                $i++;
            }
        }
        return $return;
    }
}

```