<?php
/**
 * @param string $str
 * @return string
 */
function removeDuplicates(string $str) {
    $charArray = str_split($str);
    $arrayLength = count($charArray);
    $outputArray = [];
    for ($i = 0; $i < $arrayLength; ++$i) {
        if (!in_array($charArray[$i], $outputArray)) {
            array_push($outputArray, $charArray[$i]);
        }
    }

    return implode($outputArray);
}