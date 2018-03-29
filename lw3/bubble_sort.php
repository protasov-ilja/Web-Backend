<?php
require_once 'include/common.inc.php';

$paramsNumber = Count($_GET);

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

echo bubbleSort($numbersArray, $arrayLength);
