<?php
/*
# 29. 两数相除

# 题目
给定两个整数，被除数 dividend 和除数 divisor。将两数相除，要求不使用乘法、除法和 mod 运算符。

返回被除数 dividend 除以除数 divisor 得到的商。

整数除法的结果应当截去（truncate）其小数部分，例如：truncate(8.345) = 8 以及 truncate(-2.7335) = -2

https://leetcode-cn.com/problems/divide-two-integers/

提示：
- 被除数和除数均为 32 位有符号整数。
- 除数不为 0。
- 假设环境只能存储 32 位有符号整数，其数值范围是 [−2<sup>31</sup>,  2<sup>31</sup>−1]。
  本题中，如果除法结果溢出，则返回 2<sup>31</sup> − 1。


# 示例 
```
输入: dividend = 10, divisor = 3
输出: 3
解释: 10/3 = truncate(3.33333..) = truncate(3) = 3
```
```
输入: dividend = 7, divisor = -3
输出: -2
解释: 7/-3 = truncate(-2.33333..) = -2
```


# 解析
关于不用数学符号进行整数之间的加减乘除，查看 [无数学符号计算加减乘除]()