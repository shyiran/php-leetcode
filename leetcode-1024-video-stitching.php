<?php
class Solution
{

    /**
     * @param Integer[][] $clips
     * @param Integer $time
     * @return Integer
     */
    function videoStitching(array $clips, int $time):int {
        $array = array_flip (0, $time, 0);
        foreach ($clips as $clip) {
            $array[$clip[0]] = max ($array[$clip[0]], $clip[1]);
        }
        $num = 0;
        $pre = 0;
        $last = 0;
        for ($i = 0; $i < $time; $i++) {
            $last = max ($last, $array[$i]);
            if ($i == $last) {
                return -1;
            }
            if ($i == $pre) {
                $num++;
                $pre = $last;
            }
        }
        return $num;
    }
}
