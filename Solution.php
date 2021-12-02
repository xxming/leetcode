<?php


class solution
{
    /**
     * 两数之和
     *
     * @param Integer[] $nums eg: [2,7,10,9]
     * @param Integer $target eg:9
     * @return Integer[] eg
     */
    function twoSum($nums, $target) {

        $len = count($nums);

        for ($i=0; $i < $len; $i++)
        {
            for ($j=$i+1; $j < $len; $j++)
            {
                if ($nums[$i] + $nums[$j] == $target)
                {
                    return [$i, $j];
                }
            }
        }
    }

    /**
     * 两数之和
     *
     * @param Integer[] $nums eg: [2,7,10,9]
     * @param Integer $target eg:9
     * @return Integer[] eg
     */
    function twoSum2($nums, $target) {

        $len = count($nums);

        $map = array_flip($nums);

        for ($i=0; $i < $len; $i++)
        {
            if (array_key_exists($target - $nums[$i], $map))
            {
                return [$i, $map[$target - $nums[$i]]];
            }
        }
    }
}