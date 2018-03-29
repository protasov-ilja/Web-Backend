<?php
header("Content-Type: text/plain; charset=UTF-8");


$paramsNumber = Count($_GET);

if ((!isset($_GET['arr'])) || ($paramsNumber != 1)) {
    header('HTTP/1.1 400 Bad Request');
    // сообщить что не так?arr=
    return;
}

$reverseArray = $_GET['arr'] == "" ? array() : explode(',', $_GET['arr']);
$stringLength = sizeof($reverseArray);
for ($i = 0; $i < $stringLength / 2; ++$i) {
    $tempVariable = $reverseArray[$i];
    $reverseArray[$i] = $reverseArray[$stringLength - $i - 1];
    $reverseArray[$stringLength - $i - 1] = $tempVariable;
}

print_r($reverseArray);
