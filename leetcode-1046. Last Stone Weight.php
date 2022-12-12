<?php

class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        foreach ($stones as $stone) $pq->insert($stone, $stone);
        while (1 < $pq->count()) {
            $outcome = $pq->extract() - $pq->extract();
            if (0 < $outcome) $pq->insert($outcome, $outcome);
        }
        return $pq->current() ?? 0;
    }
}

?>