<?php
// string.inc.php

function last($str)
{
    return ($str[strlen($str) - 1]);
}

function withoutLast($str)
{
    return (substr($str, 0, -1));
}

function revers($str)
{
    $reverseArray = str_split($str);
    $stringLength = sizeof($reverseArray);
    for ($i = 0; $i < $stringLength / 2; ++$i) {
        $tempVariable = $reverseArray[$i];
        $reverseArray[$i] = $reverseArray[$stringLength - $i - 1];
        $reverseArray[$stringLength - $i - 1] = $tempVariable;
    }

    return (implode('', $reverseArray));
}

function removeExtraBlanks($str)
{
    $verifiableArray = str_split($str);
    $arrayLength = sizeof($verifiableArray);
    $i = 0;
    while ($verifiableArray[$i] == ' ') {
        ++$i;
    }

    $outputString = "";
    for ($j = $i; $j < $arrayLength; ++$j) {
        if (($verifiableArray[$j] != ' ') || (($j + 1 < $arrayLength) && ($verifiableArray[$j] == ' ') && ($verifiableArray[$j + 1] != ' '))) {
            $outputString = $outputString . $verifiableArray[$j];
        }
    }

    return $outputString;
}

function checkIdentifier($str)
{
    $verifiableArray = str_split($str);
    $arrayLength = sizeof($verifiableArray);
    $isCorrect = "yes";
    $explanationLine = "";
    if ((ord($verifiableArray[0]) >= 97) && (ord($verifiableArray[0]) <= 122)) {
        for ($i = 1; $i < $arrayLength; ++$i) {
            $charNumber = ord($verifiableArray[$i]);
            if (!((($charNumber >= 97) && ($charNumber <= 122)) || (($charNumber >= 65) && ($charNumber <= 90)) || (($charNumber >= 48) && ($charNumber <= 57)) || ($charNumber == 95))) {
                $isCorrect = "no";
                $explanationLine = ": this symbol '" . $verifiableArray[$i] . "' can not be used inside the identifier";
            }

            if (($i == $arrayLength - 1) && (!((($charNumber >= 97) && ($charNumber <= 122)) || (($charNumber >= 65) && ($charNumber <= 90)) || (($charNumber >= 48) && ($charNumber <= 58))))) {
                $isCorrect = "no";
                $explanationLine = ": This symbol '" . $verifiableArray[$i] . "'  can't be used at the end of the identifier";
            }
        }
    } else {
        $isCorrect = "no";
        if ((ord($verifiableArray[0]) >= 65) && (ord($verifiableArray[0]) <= 90)) {//IntlChar
            $explanationLine = ": this symbol '" . $verifiableArray[0] . "' can't be used at the beginning of the identifier according to rule SR3";
        } else {
            $explanationLine = ": this symbol '" . $verifiableArray[0] . "' can't be used at the beginning of the identifier";
        }
    }

    return $isCorrect . $explanationLine;
}
