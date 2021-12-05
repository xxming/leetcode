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

    /**
     * 判定字符是否唯一
     *
     * eg:
     * Input    : "leetcode"
     * Output   : false
     * Expected : false
     *
     * @param String $astr
     * @return Boolean
     */
    function isUnique($astr) {

        $len = strlen($astr);
        for ($i=0; $i<$len; $i++)
        {
            if (
                strpos(
                    substr($astr, $i+1, $len-$i-1),
                    substr($astr, $i, 1)
                ) !== false

            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * 判定是否互为字符重排
     *
     * eg:
     * Input    :   "abc"
     *              "bca"
     * Output   : true
     * Expected : true
     *
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function CheckPermutation($s1, $s2) {
        if (strlen($s1) != strlen($s2))
        {
            return false;
        }

        $map = [];

        for ($i=0; $i<strlen($s1); $i++)
        {
            $map[$s1[$i]] += 1;
        }

        for ($i=0; $i<strlen($s2); $i++)
        {
            $map[$s2[$i]] -= 1;
        }

        foreach ($map as $cnt)
        {
            if ($cnt !== 0)
            {
                return false;
            }
        }

        return true;
    }

    /**
     * 字符串压缩
     *
     * eg:
     * Input    : "aabcccccaa"
     * Output   : "a2b1c5a2"
     * Expected : "a2b1c5a2"
     *
     * @param String $S
     * @return String
     */
    function compressString($S) {

        $len = strlen($S);

        $idx = $S[0];

        $cnt = 1;

        $str = '';

        for ($i=1; $i<$len; $i++)
        {
            if ($S[$i] == $idx)
            {
                $cnt += 1;
            }
            else
            {
                $str .= $idx . $cnt;
                $idx = $S[$i];
                $cnt = 1;
            }
        }

        // 结尾
        $str .= $idx . $cnt;

        if (strlen($str) >= strlen($S))
        {
            return $S;
        }

        return $str;
    }

    /**
     * 字符串轮转
     * eg:
     * Input    : "waterbottle"
     *            "erbottlewat"
     * Output   : true
     * Expected : true
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function isFlipedString($s1, $s2) {

        if (strlen($s1) != strlen($s2))
        {
            return false;
        }

        if ($s1 === $s2)
        {
            return true;
        }

        if (strpos($s2 . $s2, $s1) !== false)
        {
            return true;
        }

        return false;
    }

    /**
     * 移除重复节点
     *
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     *
     * eg:
     * Input    : [1, 2, 3, 3, 2, 1]
     * Output   : [1,2,3]
     * Expected : [1,2,3]
     *
     */
    function removeDuplicateNodes($head) {

        $cur = $head;
        $arr = [$cur->val => 1];

        while($cur->next)
        {
            if(isset($arr[$cur->next->val]))
            {
                $cur->next = $cur->next->next;
            }
            else
            {
                $arr[$cur->next->val] = 1;
                $cur = $cur->next;
            }
        }

        return $head;
    }

    /**
     * 是否回文链表
     *
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     *
     * eg:
     * Input    : [1,2]
     * Output   : false
     * Expected : false
     *
     */
    function isPalindrome($head) {

        $arr = [];

        while ($head)
        {
            $arr[] = $head->val;

            $head = $head->next;
        }

        return $arr == array_reverse($arr);
    }
}