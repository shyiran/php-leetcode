### 74. 搜索二维矩阵

# 题目
编写一个高效的算法来判断 m x n 矩阵中，是否存在一个目标值。该矩阵具有如下特性：

每行中的整数从左到右按升序排列。
每行的第一个整数大于前一行的最后一个整数。

https://leetcode-cn.com/problems/search-a-2d-matrix

提示：
- m == matrix.length
- n == matrix[i].length
- 1 <= m, n <= 100 
- -10<sup>4</sup> <= matrix[i][j], target <= 10<sup>4</sup>

# 示例
```
输入：matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 13
输出：false
```
```
输入：matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 3
输出：true
```


# 解析

##### 两次二分查找
&emsp;&emsp;由于每行的第一个元素大于前一行的最后一个元素，且每行元素是升序的，所以每行的第一个元素大于前一行的第一个元素，因此矩阵第一列的元素是升序的。

&emsp;&emsp;可以对矩阵的第一列的元素二分查找，找到最后一个不大于目标值的元素，然后在该元素所在行中二分查找目标值是否存在。

# 代码
```php
$arg = [[1,3,5,7],[10,11,16,20],[23,30,34,60]]; $target = 13;
$arg = [[1,3,5,7],[10,11,16,20],[23,30,34,60]]; $target = 3;
(new LeetCode0074)->main($arg, $target);

class LeetCode0074
{
    public function main($arg, $target){
        var_dump($this->searchMatrix($arg, $target));
    }

    function searchMatrix($matrix, $target)
    {
        $rowIndex = $this->_binaryearchFirstColumn($matrix, $target);
        if ($rowIndex < 0) {
            return false;
        }
        return $this->_binarySearchRow($matrix[$rowIndex], $target);
    }

    protected function _binaryearchFirstColumn($matrix, $target)
    {
        $low = -1;
        $high = count($matrix) - 1;
        while ($low < $high) {
            $mid = $low + (($high - $low + 1) >> 1);
            if ($matrix[$mid][0] <= $target) {
                $low = $mid;
            } else {
                $high = $mid - 1;
            }
        }
        return $low;
    }

    protected function _binarySearchRow($row, $target)
    {
        $low = 0;
        $high = count($row) - 1;
        while ($low <= $high) {
            $mid = $low + (($high - $low + 1) >> 1);
            if ($row[$mid] == $target) {
                return true;
            } else if ($row[$mid] > $target) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        return false;
    }

}
```