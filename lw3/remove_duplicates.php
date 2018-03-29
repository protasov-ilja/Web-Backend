<?php
header('Content-type: text/html; charset=utf-8');
//TODO разбить на функции и поделить на файлы
if ($argc != 2) {
    echo "Incorrect number of arguments!\n Usage php remove_duplicates.php <\input string>";
    return;
}

function str_split_unicode($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }

        return $ret;
    }

    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

$charArray = str_split_unicode($argv[1]);
$arrayLength = sizeof($charArray);
$outputArray = [];
for ($i = 0; $i < $arrayLength; ++$i) {
    if (!in_array($charArray[$i], $outputArray)) {
        array_push($outputArray, $charArray[$i]);
    }
}

echo implode($outputArray);

// 2 variant
//$charArray = array_unique($charArray);
//echo implode($charArray);
