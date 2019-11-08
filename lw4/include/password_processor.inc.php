<?php
/**
 * @param array $password
 * @return int
 */
function getPasswordStrength(array $password) {
    $symbolCounter = 0;
    $numberCounter = 0;
    $upperSymbolCounter = 0;
    $lowerSymbolCounter = 0;
    $isOnlySymbols = true;
    $isOnlyNumbers = true;
    $repeatCounter = 0;
    $repetitionCheckingArray = array();
    $repetitionArray = array();
    $arrayLength = count($password);
    for ($i = 0; $i < $arrayLength; ++$i) {
        if (in_array($password[$i], $repetitionCheckingArray)) {
            $repeatCounter++;
            if (!in_array($password[$i], $repetitionArray)) {
                array_push($repetitionArray, $password[$i]);
            }
        } else {
            array_push($repetitionCheckingArray, $password[$i]);
        }

        if (is_numeric($password[$i])) {
            $isOnlySymbols = false;
            $numberCounter++;
        } else {
            $symbolCounter++;
            $isOnlyNumbers = false;
            if (ctype_upper($password[$i])) {
                $upperSymbolCounter++;
            } else if (ctype_lower($password[$i])) {
                $lowerSymbolCounter++;
            }
        }
    }

    return (checkReliabilityOfNumbers($arrayLength, $numberCounter, $isOnlyNumbers) +
            checkReliabilityByCaseOfSymbols($arrayLength, $upperSymbolCounter, $lowerSymbolCounter) +
            checkReliabilityOfSymbols($arrayLength, $symbolCounter, $isOnlySymbols) -
            checkReliabilityByRepetitions($repeatCounter, count($repetitionArray)));
}


function checkReliabilityByRepetitions($repeatCounter, $repeatSymbolsCounter) {
    return ($repeatCounter + $repeatSymbolsCounter);
}

function checkReliabilityOfSymbols($lineLength, $symbolCounter, $isOnlySymbols) {
    $result = 4 * $symbolCounter;
    if ($isOnlySymbols) {
        $result -= $lineLength;
    }

    return $result;
}

function checkReliabilityByCaseOfSymbols($lineLength, $upperSymbolCounter, $lowerSymbolCounter) {
    $result = 0;
    if ($lowerSymbolCounter != 0) {
        $result += ($lineLength - $lowerSymbolCounter) * 2;
    }

    if ($upperSymbolCounter != 0) {
        $result += ($lineLength - $upperSymbolCounter) * 2;
    }

    return $result;
}

function checkReliabilityOfNumbers($lineLength, $numberCounter, $isOnlyNumbers) {
    $result = 4 * $numberCounter;
    if ($isOnlyNumbers) {
        $result -= $lineLength;
    }

    return $result;
}