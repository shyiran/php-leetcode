### 875. 爱吃香蕉的珂珂

# 题目
珂珂喜欢吃香蕉。这里有 n 堆香蕉，第 i 堆中有 piles[i] 根香蕉。警卫已经离开了，将在 h 小时后回来。

珂珂可以决定她吃香蕉的速度 k （单位：根/小时）。每个小时，她将会选择一堆香蕉，从中吃掉 k 根。如果这堆香蕉少于 k 根，她将吃掉这堆的所有香蕉，
然后这一小时内不会再吃更多的香蕉。

珂珂喜欢慢慢吃，但仍然想在警卫回来前吃掉所有的香蕉。

返回她可以在 h 小时内吃掉所有香蕉的最小速度 k（k 为整数）。

提示：
- 1 <= piles.length <= 10<sup>4</sup>
- piles.length <= h <= 10<sup>9</sup>
- 1 <= piles[i] <= 10<sup>9</sup>

# 示例
```
输入：piles = [3,6,7,11], h = 8
输出：4
```
```
输入：piles = [30,11,23,4,20], h = 5
输出：30
```
```
输入：piles = [30,11,23,4,20], h = 6
输出：23
```


# 解析

#### 二分查找

&emsp;&emsp;例如 piles = [3, 6, 7, 11], H = 8：
- 如果每小时吃 3 根，需要 1 + 2 + 3 + 4 = 10
- 如果每小时吃 4 根，需要 1 + 2 + 2 + 3 = 8

&emsp;&emsp;每小时吃的越少，总用时越长，可见单调性，运用二分搜索，eatingTime(k)<=H 的最大 eatingTime 对应的 k




# 代码
```php
$arg = [3, 6, 7, 8]; $h = 8;
(new LeetCode0875())->main($arg, $h);

class LeetCode0875 
{
    function main($arg, $h) {
        return $this->minEatingSpeed($arg, $h);
    }
    
    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeed($piles, $h) {
        $l = 1;
        $r = array_sum($piles);
        while ($l < $r) {
            $mid = $l + (($r - $l) >> 1);
            if ($this->eatingTime($piles, $mid) <= $h) {
                $r = $mid;
            } else {
                $l = $mid + 1;
            }
        }
        return $l;
    }

    private function eatingTime($piles, $k) {
        $res = 0;
        foreach ($piles as $pile) {
            $res += ceil($pile / $k);
        }
        return $res;
    }
}
```