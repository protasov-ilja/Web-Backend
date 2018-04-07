<?php
// string.inc.php

function last(string $str) {
    return $str[strlen($str) - 1];
}

function withoutLast(string $str) {
    return substr($str, 0, -1);
}

function revers(string $str) {
    $reverseArray = str_split($str);
    $stringLength = count($reverseArray);
    for ($i = 0; $i < $stringLength / 2; ++$i) {
        $tempVariable = $reverseArray[$i];
        $reverseArray[$i] = $reverseArray[$stringLength - $i - 1];
        $reverseArray[$stringLength - $i - 1] = $tempVariable;
    }

    return implode('', $reverseArray);
}

/**
 * @param string $str
 * @return string
 */
function removeExtraBlanks(string $str) {
    $verifiableArray = str_split($str);
    $arrayLength = count($verifiableArray);
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
