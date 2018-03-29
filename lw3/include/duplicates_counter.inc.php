<?php
function countAndDisplayDuplicates($inputString) {
    $inputArray = $inputString == "" ? array() : str_split(strtolower($inputString));
    $stringLength = sizeof($inputArray);
    $checkArr = array();
    for ($i = 0; $i < $stringLength; ++$i) {
        $counter = 0;
        if (!in_array($inputArray[$i], $checkArr)) {
            for ($j = 0; $j < $stringLength; ++$j) {
                if ($inputArray[$i] == $inputArray[$j]) {
                    $counter++;
                }
            }

            array_push($checkArr, $inputArray[$i]);
            if ($inputArray[$i] == ' ') {
                echo nl2br("'" . $inputArray[$i] . "'(пробел) - " . $counter . PHP_EOL);
            } else {
                echo nl2br($inputArray[$i] . " - " . $counter . PHP_EOL);
            }
        }
    }
}