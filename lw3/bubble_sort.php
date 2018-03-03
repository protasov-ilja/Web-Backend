<?php
    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ((!isset($_GET['numbers'])) || ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        return;
    }

    $numbersArray = explode(',', $_GET['numbers']);
    $arrayLength = sizeof($numbersArray);
    for ($i = 0; $i < $arrayLength; ++$i) {
        if (is_numeric($numbersArray[$i])) {
            $numbersArray[$i] = intval($numbersArray[$i]);
        } else {
            header('HTTP/1.1 400 Bad Request');
            return;
        }
    }

    for($i = 1; $i < $arrayLength; ++$i) {
        for($j=$arrayLength - 1; $j >= $i; --$j) {
            if($numbersArray[$j - 1] > $numbersArray[$j]) {
                $bufferVariable = $numbersArray[$j - 1];
                $numbersArray[$j - 1] = $numbersArray[$j];
                $numbersArray[$j] = $bufferVariable;
            }
        }
    }

    echo implode(',', $numbersArray);
