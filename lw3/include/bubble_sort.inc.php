<?php
    function bubbleSort($numbersArray, $arrayLength) {
        for($i = 1; $i < $arrayLength; ++$i) {
            for($j=$arrayLength - 1; $j >= $i; --$j) {
                if($numbersArray[$j - 1] > $numbersArray[$j]) {
                    $bufferVariable = $numbersArray[$j - 1]; //вынести в функцию swap
                    $numbersArray[$j - 1] = $numbersArray[$j];
                    $numbersArray[$j] = $bufferVariable;
                }
            }
        }

        return implode(',', $numbersArray);//implode делать снаружи чтобы не делать 2 действия
    }