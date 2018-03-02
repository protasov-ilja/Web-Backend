<?php
    // string.inc.php

    function last($str) {
        return ($str[strlen($str) - 1]);
    }

    function withoutLast($str) {
        return (substr($str, 0, -1));
    }

    function revers($str) {
        $reverseArray = explode(',', $str);
        $stringLength = sizeof($reverseArray);
        for ($i = 0; $i < $stringLength / 2; ++$i) {
            $tempVariable = $reverseArray[$i];
            $reverseArray[$i] = $reverseArray[$stringLength - $i - 1];
            $reverseArray[$stringLength - $i - 1] = $tempVariable;
        }

        return (implode('', $reverseArray));
    }


