<?php
    // check_identifier.php

    function checkIdentifier($str) {
        $verifiableArray = str_split($str);
        $arrayLength = sizeof($verifiableArray);
        $isCorrect = "yes";
        $explanationLine = "";
        if ((ord($verifiableArray[0]) >= 97) && (ord($verifiableArray[0]) <= 122)) {
            for ($i = 1; $i < $arrayLength; ++$i) {
                $charNumber = ord($verifiableArray[$i]);
                if (!((($charNumber >= 97) && ($charNumber <= 122)) || (($charNumber >= 65) && ($charNumber <= 90)) || (($charNumber >= 48) && ($charNumber <= 57)) || ($charNumber == 95))) {
                    $isCorrect = "no";
                    $explanationLine = ": this symbol '". $verifiableArray[$i]. "' can not be used inside the identifier";
                }

                if (($i == $arrayLength - 1) && (!((($charNumber >= 97) && ($charNumber <= 122)) || (($charNumber >= 65) && ($charNumber <= 90)) || (($charNumber >= 48) && ($charNumber <= 58))))) {
                    $isCorrect = "no";
                    $explanationLine = ": This symbol '". $verifiableArray[$i]. "'  can't be used at the end of the identifier";
                }
            }
        } else {
            $isCorrect = "no";
            if ((ord($verifiableArray[0]) >= 65) && (ord($verifiableArray[0]) <= 90)) {
                $explanationLine = ": this symbol '". $verifiableArray[0]. "' can't be used at the beginning of the identifier according to rule SR3";
            } else {
                $explanationLine = ": this symbol '" . $verifiableArray[0] . "' can't be used at the beginning of the identifier";
            }
        }
            return $isCorrect. $explanationLine;
    }

    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ((!isset($_GET['identifier'])) || ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        return;
    }

    if (strlen($_GET['identifier']) != 0){
        echo (checkIdentifier($_GET['identifier']));
    } else {
        echo "no: identifier is empty";
    }
