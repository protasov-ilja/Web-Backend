<?php

function removeDuplicates($str) {
    $charArray = str_split_unicode($str);
    $arrayLength = sizeof($charArray);
    $outputArray = [];
    for ($i = 0; $i < $arrayLength; ++$i) {
        if (!in_array($charArray[$i], $outputArray)) {
            array_push($outputArray, $charArray[$i]);
        }
    }

    return implode($outputArray);
}

function str_split_unicode($str, $length = 1) {
    $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
    if ($length > 1) {
        $chunks = array_chunk($tmp, $length);
        foreach ($chunks as $i => $chunk) {
            $chunks[$i] = join('', (array) $chunk);
        }

        $tmp = $chunks;
    }

    return $tmp;
}