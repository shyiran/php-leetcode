### 135. 分发糖果

# 题目
n 个孩子站成一排。给你一个整数数组 ratings 表示每个孩子的评分。
你需要按照以下要求，给这些孩子分发糖果：
- 每个孩子至少分配到 1 个糖果。
- 相邻两个孩子评分更高的孩子会获得更多的糖果。

请你给每个孩子分发糖果，计算并返回需要准备的 最少糖果数目 。

https://leetcode-cn.com/problems/candy/

# 示例：
```
输入：ratings = [1,0,2]
输出：5
解释：你可以分别给第一个、第二个、第三个孩子分发 2、1、2 颗糖果。
```

```
输入：ratings = [1,2,2]
输出：4
解释：你可以分别给第一个、第二个、第三个孩子分发 1、2、1 颗糖果。
     第三个孩子只得到 1 颗糖果，这满足题面中的两个条件。
```

提示：
- n == ratings.length
- 1 <= n <= 2 * 10^4
- 0 <= ratings[i] <= 2 * 10^4

# 解析

&emsp;&emsp;可以将「相邻的孩子中，评分高的孩子必须获得更多的糖果」这句话拆分为两个规则，分别处理。
- 左规则：当 ratings[i−1]<ratings[i] 时，i 号学生的糖果数量将比 i−1 号孩子的糖果数量多。
- 右规则：当 ratings[i]>ratings[i+1] 时，i 号学生的糖果数量将比 i+1 号孩子的糖果数量多。

&emsp;&emsp;遍历该数组两次，处理出每一个学生分别满足左规则或右规则时，最少需要被分得的糖果数量。每个人最终分得的糖果数量即为这两个数量的最大值。

&emsp;&emsp;具体地，以左规则为例：从左到右遍历该数组，假设当前遍历到位置 i，如果有 ratings[i−1]<ratings[i]，
那么 i 号学生的糖果数量将比 i−1 号孩子的糖果数量多，令 left[i]=left[i−1]+1 即可，否则令 left[i]=1。

&emsp;&emsp;在实际代码中，先计算出左规则 left 数组，在计算右规则的时候只需要用单个变量记录当前位置的右规则，同时计算答案即可。

https://leetcode.cn/problems/candy/
# 代码

```php
$ratings = [1,2,2,5,4,3,2];
(new LeetCode0135())->main($ratings);

class LeetCode0135
{
    public function main($ratings)
    {
        echo $this->candy($ratings);
    }

    function candy($ratings) {
        $len = count($ratings);
        $left = array_fill(0, $len, 0);
        for ($i = 0; $i < $len; $i++) {
            if ($i > 0 && $ratings[$i] > $ratings[$i - 1]) {
                $left[$i] = $left[$i - 1] + 1;
            } else {
                $left[$i] = 1;
            }
        }
        $right = 0;
        $res = 0;
        for ($i = $len - 1; $i >= 0; $i--) {
            if ($i < $len - 1 && $ratings[$i] > $ratings[$i + 1]) {
                $right++;
            } else {
                $right = 1;
            }
            $res += max($left[$i], $right);
        }
        return $res;
    }
}
```