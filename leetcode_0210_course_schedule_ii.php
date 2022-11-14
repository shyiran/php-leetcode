<?php
/*
# 210. 课程表 II

# 题目
现在你总共有 numCourses 门课需要选，记为 0 到 numCourses - 1。给你一个数组 prerequisites ，其中 prerequisites[i] = [ai, bi] ，表示在选修课程 ai 前 必须 先选修 bi 。

例如，想要学习课程 0 ，你需要先完成课程 1 ，我们用一个匹配来表示：[0,1] 。
返回你为了学完所有课程所安排的学习顺序。可能会有多个正确的顺序，你只要返回 任意一种 就可以了。如果不可能完成所有课程，返回 一个空数组 。

https://leetcode.cn/problems/course-schedule-ii

提示：
- 1 <= numCourses <= 2000
- 0 <= prerequisites.length <= numCourses * (numCourses - 1)
- prerequisites[i].length == 2
- 0 <= ai, bi < numCourses
- ai != bi
- 所有[ai, bi] 互不相同


# 示例
```
输入：numCourses = 2, prerequisites = [[1,0]]
输出：[0,1]
解释：总共有 2 门课程。要学习课程 1，你需要先完成课程 0。因此，正确的课程顺序为 [0,1] 。
```

```
输入：numCourses = 4, prerequisites = [[1,0],[2,0],[3,1],[3,2]]
输出：[0,2,1,3]
解释：总共有 4 门课程。要学习课程 3，你应该先完成课程 1 和课程 2。并且课程 1 和课程 2 都应该排在课程 0 之后。
因此，一个正确的课程顺序是 [0,1,2,3] 。另一个正确的排序是 [0,2,1,3] 。
```

```
输入：numCourses = 1, prerequisites = []
输出：[0]
```

# 解析

## 拓扑排序
详细内容，见 [leetcode-0207-中等-课程表.md](./leetcode-0207-中等-课程表.md)。

区别只在这一题需要输出课程顺序。


# 代码
*/
class Node0210 {
    public $name;       // 课程的编号
    public $in;         // 入度
    public $nexts;      // 邻居
    
    function __construct ($n) {
        $this->name = $n;
        $this->in = 0;
        $this->nexts = [];
    }
}

class LeetCode0210 {

    function findOrder($numCourses, $prerequisites) {
        $res = [];
        if (!$prerequisites) {
            for ($i = $numCourses - 1; $i >= 0; $i--) {
                $res[] = $i;
            }
            return $res;
        }
        // hash   key:课程编号，val:课程node
        $nodes = array();
        foreach ($prerequisites as $arr) {
            $to = $arr[0];
            $from = $arr[1];
            if (!array_key_exists($to, $nodes)) {
                $nodes[$to] = new Node0210($to);
            }
            if (!array_key_exists($from, $nodes)) {
                $nodes[$from] = new Node0210($from);
            }
            $t = $nodes[$to];
            $f = $nodes[$from];
            // from 的邻居加上 to
            $f->nexts[] = $t;
            // to 的入度 +1
            $t->in++;
        }
        $needNum = count($nodes);  //有依赖关系的课程的数量
        $zeroInQueue = new SplDoublyLinkedList();
        // 第一批入度为 0 的课程 进队列
        foreach ($nodes as $node) {
            if ($node->in == 0) {
                $zeroInQueue->push($node);
            }
        }
        // 弹出的课程的数量
        $count = 0;
        while ($zeroInQueue->isEmpty() == false) {
            $cur = $zeroInQueue->shift();
            $res[] = $cur->name;
            $count++;
            foreach ($cur->nexts as $next) {
                // 去掉弹出的课程的影响，此时入度变为0的话，进队列
                if (--$next->in == 0) {
                    $zeroInQueue->push($next);
                }
            }
        }
        // 如果弹出的课程的数量 == 实际有依赖课程的数量，说明课程可以实现
        if ($count != $needNum) {
            return array();
        }
        for ($i = $numCourses - 1; $i >= 0; $i--) {
            !in_array($i, $res) && $res[] = $i;
        }
        return $res;
    }
}