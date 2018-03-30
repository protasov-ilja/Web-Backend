<?php
// string.inc.php

function last($str) {
    return $str[strlen($str) - 1];
}

function withoutLast($str) {
    return substr($str, 0, -1);
}

function revers($str) {
    $reverseArray = str_split($str);
    $stringLength = sizeof($reverseArray);
    for ($i = 0; $i < $stringLength / 2; ++$i) {
        $tempVariable = $reverseArray[$i];
        $reverseArray[$i] = $reverseArray[$stringLength - $i - 1];
        $reverseArray[$stringLength - $i - 1] = $tempVariable;
    }

    return implode('', $reverseArray);
}

function removeExtraBlanks($str) {
    $verifiableArray = str_split($str);
    $arrayLength = sizeof($verifiableArray);
    $i = 0;
    while ($verifiableArray[$i] == ' ') {
        ++$i;
    }

    $outputString = "";
    for ($j = $i; $j < $arrayLength; ++$j) {
        if (($verifiableArray[$j] != ' ') || (($j + 1 < $arrayLength) && ($verifiableArray[$j] == ' ') && ($verifiableArray[$j + 1] != ' '))) {
            $outputString = $outputString . $verifiableArray[$j];
        }
    }

    return $outputString;
}
