<?php
function sortArray($numbersArray, $arrayLength) {
    for($i = 1; $i < $arrayLength; ++$i) {
        for($j=$arrayLength - 1; $j >= $i; --$j) {
            if($numbersArray[$j - 1] > $numbersArray[$j]) {
                swap($numbersArray[$j - 1], $numbersArray[$j]);
            }
        }
    }

    return $numbersArray;
}

function swap(&$variable1, &$variable2) {
    $bufferVariable = $variable1;
    $variable1 = $variable2;
    $variable2 = $bufferVariable;
}
