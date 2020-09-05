<?php
// This comes from a leetcode daily challenge.
//
// Given a non-empty string check if it can be constructed by taking a substring 
// of it and appending multiple copies of the substring together. You may assume
// the given string consists of lowercase English letters only and its length 
// will not exceed 10000.
//
// https://leetcode.com/explore/challenge/card/september-leetcoding-challenge/554/week-1-september-1st-september-7th/3447/
//

// My solution, which was also the fastest solution among all PHP solutions.
// This was my first attempt at the problem and it worked on the first try.
// That like never happens. But here we are.

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function repeatedSubstringPattern($s) {
        $size = strlen($s);
        
        // No reason to look for substrings longer than half
        // the size of the original string as there is no way
        // that would make a repition pattern.
        $max = (int)($size / 2);
        
        for ($i = $max; $i > 0; $i--) {
            
            // If $i isn't evenly divisible by the size of the
            // string, then there is no way to make the string
            // with the substring since it would be a different
            // number of characters.
            if ($size % $i !== 0) {
                continue;
            }
            
            // Here we go, check if repeated string is same as
            // original string.
            $sub = substr($s, 0, $i);
            
            $repeats = $size / $i;
            $created = str_repeat($sub, $repeats);
            if ($created === $s) {
                return true;
            }
        }
        
        return false;
    }
}

// Unfortunately, leetcode doesn't allow you to view everyone's submission,
// but some people do post their's in the discussion of a problem. Here 
// were solutions from two others.

class Solution2 {

    /**
     * @param String $s
     * @return Boolean
     */
    function repeatedSubstringPattern($s) {
        $i = 0; 
        $j = 1; 
        $table = [0]; 
        $len = 0;
        while ($j < strlen($s)) {
            if ($s[$i] === $s[$j]) {
                $len++; 
                 $table[$j] = $len;
                 $j++;
                $i++;
            } else {
                if (!$i) {
                    $len = 0;
                    $table[$j] = $len;
                    $j++;
                } else {
                    if ($i) $i = $table[$i-1];
                    $len = $i;
                };     
            };
        }; 
        
        if (!$table[strlen($s) - 1]) return false;
        return !(strlen($s) % (strlen($s) - $table[strlen($s) - 1]));
    }
}

class Solution3 {
    function repeatedSubstringPattern($s) {
        $res = false;
        $len = strlen($s);
        if ($len > 1){
            $len_h = intval(floor($len/2));
            for($i = $len_h; $i > 0; $i--){
                if ( $len % $i == 0){
                    if ( str_repeat( substr($s,0,$i),$len/$i ) == $s){
                        return true;
                    }
                }
            }
        }
        return $res;
        
    }
}
