### 378. 有序矩阵中第 K 小的元素

# 题目
给你一个 n×n 矩阵 matrix ，其中每行和每列元素均按升序排序，找到矩阵中第 k 小的元素。
请注意，它是排序后的第 k 小元素，而不是第 k 个不同的元素。

你必须找到一个内存复杂度优于 O(n²) 的解决方案。

https://leetcode-cn.com/problems/kth-smallest-element-in-a-sorted-matrix

提示：
- n == matrix.length
- n == matrix[i].length
- 1 <= n <= 300
- -109 <= matrix[i][j] <= 10<sup>9</sup>
- 题目数据 保证 matrix 中的所有行和列都按 非递减顺序 排列
- 1 <= k <= n²


# 示例
```
输入：matrix = [[1,5,9],[10,11,13],[12,13,15]], k = 8
输出：13
解释：矩阵中的元素为 [1,5,9,10,11,12,13,13,15]，第 8 小元素是 13
```
```
输入：matrix = [[-5]], k = 1
输出：-5
```


# 解析

##### 二分查找

&emsp;&emsp;由题目给出的性质可知，这个矩阵内的元素是从左上到右下递增的（假设矩阵左上角为 matrix[0][0]）

&emsp;&emsp;整个二维数组中 matrix[0][0] 为最小值，matrix[n−1][n−1] 为最大值，将其分别记作 l 和 r。可以发现一个性质：
任取一个数 mid 满足 l≤mid≤r，那么矩阵中不大于 mid 的数，肯定全部分布在矩阵的左上角。

&emsp;&emsp;![image](http://dfs.cricbigdata.com/view/fc3d0221e7394ed5e14035af2f5645896c76f2da.png)

&emsp;&emsp;如上图，取 mid=8，可以看到矩阵中大于 mid 的数和不大于 mid 的数分别形成了两个板块，沿着中间那条锯齿线分开。
其中左上角板块的大小就是不大于 mid 的数的数量。

&emsp;&emsp;只要沿着这条锯齿线走一遍即可计算得出两个板块的大小，也自然就统计出了这个矩阵中不大于 mid 的数的个数了

&emsp;&emsp;走法如下：
- 初始位置在 matrix[n-1][0]，即左下角
- 设当前位置为 matrix[i][j]。若 matrix[i][j]<=mid，则将当前所在列的不大于 mid 的数的数量（即 i+1）累加到答案中，并向右移动，否则向上移动。
- 不断移动直到走出格子位置

&emsp;&emsp;这样的 走法时间复杂度为 O(n)，即线性计算。

&emsp;&emsp;假设答案为 x，那么可以直到 l<=x<=r，这样就确定了二分的上下界。每次对于猜测的答案 mid，计算矩阵中有多少数不大于 mid
- 如果数量不少于 k，那么说明最终答案 x 不大于 mid
- 如果数量少于 k，那么说明最终答案 x 大于 mid

&emsp;&emsp;这样可以计算出最终的结果 x 了
# 代码
```php
class LeetCode0378
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($matrix, $k)
    {
        $n = count($matrix);
        $left = $matrix[0][0];
        $right = $matrix[$n - 1][$n - 1];
        while ($left < $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($this->_check($matrix, $mid, $k, $n)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        return $left;
    }

    protected function _check($matrix, $mid, $k, $n)
    {
        $i = $n - 1;
        $j = 0;
        $num = 0;
        while ($i >= 0 && $j < $n) {
            if ($matrix[$i][$j] <= $mid) {
                $num += $i + 1;
                $j++;
            } else {
                $i--;
            }
        }
        return $num >= $k;
    }
}
```