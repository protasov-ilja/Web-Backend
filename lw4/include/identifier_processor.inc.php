<?php
/**
 * @param string $str
 * @return string
 * @throws Exception
 */
function checkIdentifier(string $str) {
    $verifiableArray = str_split($str);
    $arrayLength = count($verifiableArray);
    if (!ctype_alpha($verifiableArray[0])) {
        throw new Exception("no: this symbol '" . $verifiableArray[0] . "' can't be used at the beginning of the identifier");
    }

    for ($i = 1; $i < $arrayLength; ++$i) {
        if (!(ctype_alpha($verifiableArray[$i]) || ctype_digit($verifiableArray[$i]))) {
            throw new Exception("no: this symbol '" . $verifiableArray[$i] . "' can not be used inside the identifier");
        }
    }

    return "yes";
}