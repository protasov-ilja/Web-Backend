<?php

function sortArray($numbersArray, $arrayLength) {
    $isSorted = false;
    $i = 1;
    while ((!$isSorted) && ($i < $arrayLength)) {
        $isSorted = true;
        for ($j = $arrayLength - 1; $j >= $i; --$j) {
            if($numbersArray[$j - 1] > $numbersArray[$j]) {
                swap($numbersArray[$j - 1], $numbersArray[$j]);
                $isSorted = false;
            }
        }

        ++$i;
    }

    return $numbersArray;
}

function swap(&$variable1, &$variable2) {
    $bufferVariable = $variable1;
    $variable1 = $variable2;
    $variable2 = $bufferVariable;
}