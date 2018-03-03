<?php
    // remove_extra_blanks.php

    function removeExtraBlanks($str) {
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

    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ((!isset($_GET['text'])) || ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        return;
    }

    if (strlen($_GET['text']) != 0){
        echo (removeExtraBlanks($_GET['text']));
    } else {
        echo "text is empty";
    }
