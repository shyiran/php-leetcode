### 1011. 在 D 天内送达包裹的能力

# 题目
传送带上的包裹必须在 days 天内从一个港口运送到另一个港口。

传送带上的第 i 个包裹的重量为 weights[i]。每一天，我们都会按给出重量（weights）的顺序往传送带上装载包裹。我们装载的重量不会超过船的最大运载重量。

返回能在 days 天内将传送带上的所有包裹送达的船的最低运载能力。

提示：
- 1 <= days <= weights.length <= 5 * 10<sup>4</sup>
- 1 <= weights[i] <= 500

# 示例
```
输入：weights = [1,2,3,4,5,6,7,8,9,10], days = 5
输出：15
解释：
船舶最低载重 15 就能够在 5 天内送达所有包裹，如下所示：
第 1 天：1, 2, 3, 4, 5
第 2 天：6, 7
第 3 天：8
第 4 天：9
第 5 天：10
```
```
输入：weights = [3,2,2,4,1,4], days = 3
输出：6
解释：
船舶最低载重 6 就能够在 3 天内送达所有包裹，如下所示：
第 1 天：3, 2
第 2 天：2, 4
第 3 天：1, 4
```
```
输入：weights = [1,2,3,1,1], days = 4
输出：3
解释：
第 1 天：1
第 2 天：2
第 3 天：3
第 4 天：1, 1
```


# 解析

&emsp;&emsp;weights = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]， D = 5。
- 若载重为 14，分成 [1, 2, 3, 4]、[5, 6]、[7]、[8]、[9]、[10]，需要 6 天
- 若载重为 15，分成 [1, 2, 3, 4, 5]、[6, 7]、[8]、[9]、[10]，需要 5 天

&emsp;&emsp; 载重越大，总用天数越小，k->days(k) 可见单调性。运用二分搜索： days[k]<=D 的最大 days 对应的 k

&emsp;&emsp;二分时候，l 即最低取值为最大货物的重量，因为如果小于这个重量，这个货物永远无法被送走；r 即最高取值为重量总和。
while 循环里，假设传送带运载能力是 mid，运完货物需要的天数为 day = days(weights, mid)，
- 如果 day 小于等于 D，那么 mid 就是一个可能的解，但是还要找有没有更小的解。调整右边界，r = mid。注意 mid 在搜索范围里，因为 mid 是问题的解
- 如果 day 大于 D，即运完货物需要的天数大于 D，需要加大传送带的运载能力，以在更短的时间里运送所有货物。调整左边界，l = mid + 1。注意，mid 
  不再包含在搜索空间中，因为此时，mid 不是问题的解
- 如果 l， r 相邻，是否会出现死循环？因为下取整以后，在 l 和 r 相临时，mid 为 l。而对 l 的更新，是 mid + 1，所以保证了在这种情况下，
  搜索空间会继续缩小，不会产生死循环。因此，使用下取整来计算 mid 是可以的  


# 代码

```php
$arg = []; $days = 5;
(new LeetCode1011())->main($arg, $days);

class LeetCode1011 
{
    function main($arg, $days) {
        return $this->shipWithinDays($arg, $days);
    }

    function shipWithinDays($weights, $days) {
        // 最低取值为最大货物的重量，如果小于这个重量，这个货物永远无法被送走
        $l = max($weights);
        // 最高取值为重量总和
        $r = array_sum($weights);
        
        while ($l < $r) {
            $mid = $l + (($r - $l) >> 1);                        
            if($this->days($weights, $mid) <= $days) {
                $r = $mid;
            } else {
                $l = $mid + 1;
            }
        }
        return $l;        
    }

    private function days($weights, $k) {
        $cur = 0;       // 当前传送带的载重
        $res = 0;
        foreach ($weights as $weight) {
            if ($cur + $weight <= $k) {
                // 如果当前的重量加上当前的货物没有超过 k，把当前货物重量加在 cur 上
                $cur += $weight;
            } else {
               // 否则的话，相当于从当前的货物开始，我们需要新的一天运输
               // res ++，同时，cur 更新为当前的重量
                $res++;
                $cur = $weight;
            }
        }
        // 最后还要做一次 res ++，因为在这里 cur 肯定不为零，还记录着最后一天需要运送的货物重量
        // 最后一天，要加到 res 中，所以 res ++
        $res++;
        return $res;
    }
}
```