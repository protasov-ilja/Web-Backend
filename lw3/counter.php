<?php

$paramsNumber = Count($_GET);
if ((!isset($_GET['string'])) || ($paramsNumber != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

$inputString = str_split(strtolower($_GET['string']));//mb_strtolower
$stringLength = sizeof($inputString);
$checkArr = array();
for ($i = 0; $i < $stringLength; ++$i) {
    $counter = 0;
    if (!in_array($inputString[$i], $checkArr)) {
        for ($j = 0; $j < $stringLength; ++$j) {
            if ($inputString[$i] == $inputString[$j]) {
                $counter++;
            }
        }

        array_push($checkArr, $inputString[$i]);
        if ($inputString[$i] == ' ') {
            echo nl2br("'" . $inputString[$i] . "'(пробел) - " . $counter . PHP_EOL);
        } else {
            echo nl2br($inputString[$i] . " - " . $counter . PHP_EOL);
        }
    }
}
