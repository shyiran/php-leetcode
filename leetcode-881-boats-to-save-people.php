### 881. 救生艇

# 题目
给定数组 people 。people[i]表示第 i 个人的体重 ，船的数量不限，每艘船可以承载的最大重量为 limit。

每艘船最多可同时载两人，但条件是这些人的重量之和最多为 limit。

返回 承载所有人所需的最小船数 。

https://leetcode-cn.com/problems/boats-to-save-people

提示：
- 1 <= people.length <= 5 * 10<sup>4</sup>
- 1 <= people[i] <= limit <= 3 * 10<sup>4</sup>

## 示例
```
输入：people = [1,2], limit = 3
输出：1
解释：1 艘船载 (1, 2)
```
```
输入：people = [3,2,2,1], limit = 3
输出：3
解释：3 艘船分别载 (1, 2), (2) 和 (3)
```
```
输入：people = [3,5,3,4], limit = 5
输出：4
解释：4 艘船分别载 (3), (3), (4), (5)
```

# 解析

#### 贪心

&emsp;&emsp;要使需要的船数尽可能地少，应当使载两人的船尽可能地多。

&emsp;&emsp;设 people 的长度为 n。考虑体重最轻的人：
- 若他不能与体重最重的人同乘一艘船，那么体重最重的人无法与任何人同乘一艘船，此时应单独分配一艘船给体重最重的人。
  从 people 中去掉体重最重的人后，缩小了问题的规模，变成求解剩余 n-1 个人所需的最小船数，将其加一即为原问题的答案。
- 若他能与体重最重的人同乘一艘船，那么他能与其余任何人同乘一艘船，为了尽可能地利用船的承载重量，选择与体重最重的人同乘一艘船是最优的。
  从 people 中去掉体重最轻和体重最重的人后，缩小了问题的规模，变成求解剩余 n−2 个人所需的最小船数，将其加一即为原问题的答案。

&emsp;&emsp;在代码实现时，可以先对 people 排序，然后用两个指针分别指向体重最轻和体重最重的人，按照上述规则来移动指针，并统计答案。
https://leetcode.cn/problems/boats-to-save-people/
# 代码
```php
class LeetCode0881
{
    function numRescueBoats($people, $limit)
    {
        $res = 0;
        sort($people);
        $light = 0;
        $heavy = count($people) - 1;
        while ($light <= $heavy) {
            if ($people[$light] + $people[$heavy] <= $limit) {
                $light++;
            }
            $heavy--;
            $res++;
        }
        return $res;
    }
    
}
```