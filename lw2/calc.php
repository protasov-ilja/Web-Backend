<?php
header('Content-type: text/html; charset=utf-8');
require_once 'include/common.inc.php';

const PARAMS_NUMBER = 3;

function checkParamsForCorrect($paramsNumber)
{
    if ($paramsNumber != PARAMS_NUMBER) {
        throw new Exception("Вы ввели невверное количество аргументов! Нужно 3: arg1, arg2, operation");
    }

    if (!isset($_GET['arg1']) || !isset($_GET['arg2']) || !isset($_GET['operation'])) {
        throw new Exception("Неправильные имена параметров! Нужно: arg1, arg2, operation");
    }

    if (!is_numeric($_GET['arg1']) || !is_numeric($_GET['arg2'])) {
        throw new Exception("Один из аргументов arg1, arg2 не число!");
    }
}

try {
    checkParamsForCorrect(count($_GET));
    echo calculate($_GET['arg1'], $_GET['arg2'], $_GET['operation']);
} catch(Exception $ex) {
    echo $ex->getMessage();
}
