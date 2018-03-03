<?php
    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ((!isset($_GET['arr'])) || ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        return;
    }

    $reverseArray = explode(',', $_GET['arr']);
    $stringLength = sizeof($reverseArray);
    for ($i = 0; $i < $stringLength / 2; ++$i) {
        $tempVariable = $reverseArray[$i];
        $reverseArray[$i] = $reverseArray[$stringLength - $i - 1];
        $reverseArray[$stringLength - $i - 1] = $tempVariable;
    }

    print_r($reverseArray);
