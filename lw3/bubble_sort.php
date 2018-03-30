<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

function getNumbersArray() {
    $inputArray = explode(',', $_GET['numbers']);
    for ($i = 0; $i < sizeof($inputArray); ++$i) {
        if (is_numeric($inputArray[$i])) {
            $inputArray[$i] = intval($inputArray[$i]);
        } else {
            throw new Exception("один или несколько элементов массива не цифра");
        }
    }

    return $inputArray;
}

try {
    $paramsNumber = Count($_GET);
    if ((!isset($_GET['numbers'])) || ($paramsNumber != 1)) {
        throw new Exception("параметр numbers отсутствует, или задан неверно!");
    }

    $numbersArray = getNumbersArray();
    echo implode(',', sortArray($numbersArray, sizeof($numbersArray)));
} catch(Exception $ex) {
    header('HTTP/1.1 400 Bad Request');
    echo $ex->getMessage();
}

