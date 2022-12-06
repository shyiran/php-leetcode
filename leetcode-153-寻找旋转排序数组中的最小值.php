### 153. 寻找旋转排序数组中的最小值

# 题目
已知一个长度为 n 的数组，预先按照升序排列，经由 1 到 n 次 旋转 后，得到输入数组。例如，原数组 nums = [0,1,2,4,5,6,7] 在变化后可能得到：
若旋转 4 次，则可以得到 [4,5,6,7,0,1,2]
若旋转 7 次，则可以得到 [0,1,2,4,5,6,7]
注意，数组 [a[0], a[1], a[2], ..., a[n-1]] 旋转一次 的结果为数组 [a[n-1], a[0], a[1], a[2], ..., a[n-2]] 。

给你一个元素值 互不相同 的数组 nums ，它原来是一个升序排列的数组，并按上述情形进行了多次旋转。请你找出并返回数组中的 最小元素 。

你必须设计一个时间复杂度为 O(logn) 的算法解决此问题。

https://leetcode-cn.com/problems/find-minimum-in-rotated-sorted-array

提示：
- n == nums.length
- 1 <= n <= 5000
- -5000 <= nums[i] <= 5000
- nums 中的所有整数 互不相同
- nums 原来是一个升序排序的数组，并进行了 1 至 n 次旋转

# 示例
```
输入：nums = [3,4,5,1,2]
输出：1
解释：原数组为 [1,2,3,4,5] ，旋转 3 次得到输入数组。
```
```
输入：nums = [4,5,6,7,0,1,2]
输出：0
解释：原数组为 [0,1,2,4,5,6,7] ，旋转 4 次得到输入数组。
```


# 解析

##### 二分查找
&emsp;&emsp;单调递增的序列是这样的：
```
    *  
   *
  *
 *
*
```

&emsp;&emsp;旋转之后：
```
 *
*
     *
    *
   *
```

&emsp;&emsp;用二分法查找，需要始终将目标值（这里是最小值）套住，并不断收缩左边界或右边界。

&emsp;&emsp;左、中、右三个位置的值相比较，有以下几种情况：
- 左值 < 中值, 中值 < 右值 ：没有旋转，最小值在最左边，可以收缩右边界
  ```
        右
     中
  左
  ```
- 左值 > 中值, 中值 < 右值 ：有旋转，最小值在左半边，可以收缩右边界
  ```
  左
        右 
     中
  ``` 
- 左值 < 中值, 中值 > 右值 ：有旋转，最小值在右半边，可以收缩左边界
  ```
     中
  左
        右
  ```
- 左值 > 中值, 中值 > 右值 ：单调递减，不可能出现

&emsp;&emsp;分析前面三种可能的情况，会发现情况1、2是一类，情况3是另一类。
- 如果中值 < 右值，则最小值在左半边，可以收缩右边界。
- 如果中值 > 右值，则最小值在右半边，可以收缩左边界。

&emsp;&emsp;通过比较中值与右值，可以确定最小值的位置范围，从而决定边界收缩的方向。

&emsp;&emsp;而情况 1 与 情况 3 都是左值 < 中值，但是最小值位置范围却不同，这说明，如果只比较左值与中值，不能确定最小值的位置范围。
所以需要通过比较中值与右值来确定最小值的位置范围，进而确定边界收缩的方向。


# 代码

```php
$arg = [3,4,5,1,2];
(new LeetCode0283)->main($arg);

class LeetCode0153
{
    function main($arg)
    {
        var_dump($this->findMin($arg));
    }

    function findMin($nums)
    {
        $left = 0;
        $right = count($nums) - 1;                      //左闭右闭区间，如果右开区间不方便判断右、值
        while ($left < $right) {                            
            $mid = $left + (($right - $left) >> 1);     //mid更靠近left
            if ($nums[$mid] > $nums[$right]) {          //中间值>右值，最小值在右半边，收缩左边界
                $left = $mid + 1;                       //因为中间值>右值，中间值肯定不是最小值，左边界可以跨过mid
            } else if ($nums[$mid] < $nums[$right]) {   //中间值<右值，最小值在左边，收缩有边界
                $right = $mid;                          //因为中间值<右值，中间值也可能是最小值，不能跨过mid
            }
        }
        return $nums[$left];
    }

}
```