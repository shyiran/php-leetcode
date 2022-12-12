<?php
/*
015. # 题目

给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？找出所有满足条件且不重复的三元组。

注意：答案中不可以包含重复的三元组。



# 示例

```
给定数组 nums = [-1, 0, 1, 2, -1, -4]，
满足要求的三元组集合为：
[
  [-1, 0, 1],
  [-1, -1, 2]
]
```

# 解析

## 排序 + 双指针

**算法流程：**

1. 特判，对于数组长度 n，如果数组为 null 或者数组长度小于 3，返回 []。
2. 对数组进行排序。
3. 遍历排序后数组：
   - 若 nums[i] > 0：因为已经排序好，所以后面不可能有三个数加和等于 0，直接返回结果。
   - 对于重复元素：跳过，避免出现重复解
   - 令左指针 L = i + 1，右指针 R = n − 1，当 L < R 时，执行循环：
     - 当 nums[i] + nums[L] + nums[R] == 0 ，执行循环，判断左界和右界是否和下一位置重复，去除重复解。
       并同时将 L, R 移到下一位置，寻找新的解
     - 若和大于 0，说明 nums[R] 太大，R 左移
     - 若和小于 0，说明 nums[L] 太小，L 右移

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/3sum
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

class LeetCode0015
{
    function threeSum($nums) {
        sort($nums);
        $res = [];
        $len = count($nums);
        // 找出 a + b + c = 0
        for ($i = 0; $i < $len - 2; $i++) {
            // 排序之后如果第一个元素已经大于零，那么无论如何组合都不可能凑成三元组，直接返回结果就可以了
            if ($nums[$i] > 0) {
                break;
            }
            // 错误去重方法，会漏掉[-1,-1,2]的情况
            /*
            if ($nums[$i] == $nums[$i+1]) {
                continue;
            }
            */
            // 正确去重方法
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            $left = $i + 1;
            $right = $len - 1;
            while ($left < $right) {
                // 如果去重复逻辑放在这里，可能直接导致 right<=left，从而漏掉了 0,0,0 这种三元组
                /*
                while (right > left && nums[right] == nums[right - 1]) right--;
                while (right > left && nums[left] == nums[left + 1]) left++;
                */
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum < 0) {
                    $left++;
                    while ($left < $right && $nums[$left] == $nums[$left - 1]) {
                        $left++;
                    }
                } else if ($sum > 0) {
                    $right--;
                    while ($left < $right && $nums[$right] == $nums[$right + 1]) {
                        $right--;
                    }
                } else {
                    $res[] = [$nums[$i], $nums[$left], $nums[$right]];
                    // 找到答案时，双指针同时收缩
                    $left++;
                    $right--;
                    // 去重逻辑应该放在找到一个三元组之后
                    while ($left < $right && $nums[$left] == $nums[$left - 1]) {
                        $left++;
                    }
                    while ($left < $right && $nums[$right] == $nums[$right + 1]) {
                        $right--;
                    }
                }
            }
        }
        return $res;
    }

}

