<?php
function checkIdentifier($str) {
    $verifiableArray = str_split($str);
    $arrayLength = sizeof($verifiableArray);
    $isCorrect = "yes";
    $explanationLine = "";
    if ((ord($verifiableArray[0]) >= 97) && (ord($verifiableArray[0]) <= 122)) {
        for ($i = 1; $i < $arrayLength; ++$i) {
            if (!(ctype_alpha($verifiableArray[$i]) || ctype_digit($verifiableArray[$i]) || (ord($verifiableArray[$i]) == 95))) {
                $isCorrect = "no";
                $explanationLine = ": this symbol '" . $verifiableArray[$i] . "' can not be used inside the identifier";
            }
            
            if (($i == $arrayLength - 1) && !(ctype_alpha($verifiableArray[$i]) || ctype_digit($verifiableArray[$i]))) {
                $isCorrect = "no";
                $explanationLine = ": This symbol '" . $verifiableArray[$i] . "'  can't be used at the end of the identifier";
            }
        }
    } else {
        $isCorrect = "no";
        if ((ord($verifiableArray[0]) >= 65) && (ord($verifiableArray[0]) <= 90)) {
            $explanationLine = ": this symbol '" . $verifiableArray[0] . "' can't be used at the beginning of the identifier according to rule SR3";
        } else {
            $explanationLine = ": this symbol '" . $verifiableArray[0] . "' can't be used at the beginning of the identifier";
        }
    }

    return $isCorrect . $explanationLine;
}