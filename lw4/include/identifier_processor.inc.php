<?php
function checkIdentifier(string $str) {
    $verifiableArray = str_split($str);
    $arrayLength = count($verifiableArray);
    $isCorrect = "yes";
    $explanationLine = "";
    if (ctype_alpha($verifiableArray[0])) {
        for ($i = 1; $i < $arrayLength; ++$i) {
            if (!(ctype_alpha($verifiableArray[$i]) || ctype_digit($verifiableArray[$i]))) {
                $isCorrect = "no";
                $explanationLine = ": this symbol '" . $verifiableArray[$i] . "' can not be used inside the identifier";
            }
        }
    } else {
        $isCorrect = "no";
        $explanationLine = ": this symbol '" . $verifiableArray[0] . "' can't be used at the beginning of the identifier";
    }

    return $isCorrect . $explanationLine;
}