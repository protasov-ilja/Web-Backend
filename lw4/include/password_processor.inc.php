<?php
//password_processor.inc.php

function checkPasswordStrength($password)
{
    $symbolCounter = 0;
    $numberCounter = 0;
    $upperSymbolCounter = 0;
    $lowerSymbolCounter = 0;
    $isOnlySymbols = true;
    $isOnlyNumbers = true;
    $repeatCounter = 0;
    $repetitionCheckingArray = array();
    $repetitionArray = array();
    $verifiableArray = str_split($password);
    $arrayLength = count($verifiableArray);
    for ($i = 0; $i < $arrayLength; ++$i) {
        if (in_array($verifiableArray[$i], $repetitionCheckingArray)) {
            $repeatCounter++;
            if (!in_array($verifiableArray[$i], $repetitionArray)) {
                array_push($repetitionArray, $verifiableArray[$i]);
            }
        } else {
            array_push($repetitionCheckingArray, $verifiableArray[$i]);
        }

        if (is_numeric($verifiableArray[$i])) {
            $isOnlySymbols = false;
            $numberCounter++;
        } else {
            $symbolCounter++;
            $isOnlyNumbers = false;
            if (ctype_upper($verifiableArray[$i])) {
                $upperSymbolCounter++;
            } else if (ctype_lower($verifiableArray[$i])) {
                $lowerSymbolCounter++;
            }
        }
    }

    return (checkReliabilityOfNumbers($arrayLength, $numberCounter, $isOnlyNumbers) +
            checkReliabilityByCaseOfSymbols($arrayLength, $upperSymbolCounter, $lowerSymbolCounter) +
            checkReliabilityOfSymbols($arrayLength, $symbolCounter, $isOnlySymbols) -
            checkReliabilityByRepetitions($repeatCounter, sizeof($repetitionArray)));
}

function checkReliabilityByRepetitions($repeatCounter, $repeatSymbolsCounter)
{
    return ($repeatCounter + $repeatSymbolsCounter);
}

function checkReliabilityOfSymbols($lineLength, $symbolCounter, $isOnlySymbols)
{
    $result = 4 * $symbolCounter;
    if ($isOnlySymbols) {
        $result -= $lineLength;
    }

    return $result;
}

function checkReliabilityByCaseOfSymbols($lineLength, $upperSymbolCounter, $lowerSymbolCounter)
{
    $result = 0;
    if ($lowerSymbolCounter != 0) {
        $result += ($lineLength - $lowerSymbolCounter) * 2;
    }

    if ($upperSymbolCounter != 0) {
        $result += ($lineLength - $upperSymbolCounter) * 2;
    }

    return $result;
}

function checkReliabilityOfNumbers($lineLength, $numberCounter, $isOnlyNumbers)
{
    $result = 4 * $numberCounter;
    if ($isOnlyNumbers) {
        $result -= $lineLength;
    }

    return $result;
}