<?php
function displayDuplicates($inputString) {
    $inputArray = $inputString == "" ? array() : str_split(strtolower($inputString));
    $stringLength = count($inputArray);
    $checkArr = array();
    for ($i = 0; $i < $stringLength; ++$i) {
        $counter = 0;
        if (!in_array($inputArray[$i], $checkArr)) {
            for ($j = $i; $j < $stringLength; ++$j) {
                if ($inputArray[$i] == $inputArray[$j]) {
                    $counter++;
                }
            }

            array_push($checkArr, $inputArray[$i]);
            displayCharAndItsCount($inputArray[$i], $counter);
        }
    }
}

function displayCharAndItsCount($char, $charCount) {
    if ($char == ' ') {
        echo nl2br("'" . $char . "'(пробел) - " .  $charCount . PHP_EOL);
    } else {
        echo nl2br($char . " - " . $charCount . PHP_EOL);
    }
}