<?php
    $ADDITION = "add";
    $SUBTRACTION = "sub";
    $MULTIPLICATION = "mul";
    $DIVISION = "div";
    $PARAMS_NUMBER = 3;

    header("Content-Type: text/plain");

    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ($paramsNumber < $PARAMS_NUMBER) {
        echo "Вы ввели недостаточное количество аргументов! Нужно 3: arg1, arg2, operation";
        return;
    } else if ($paramsNumber > $PARAMS_NUMBER) {
        echo "Вы ввели количество параметров больше допустимого! Нужно 3: arg1, arg2, operation";
        return;
    }

    if (!isset($_GET['arg1']) && !isset($_GET['arg2']) && !isset($_GET['arg1'])) {
        echo "Неправильные имена параметров! Нужно: arg1, arg2, operation ";
        return;
    }

    if (is_numeric($_GET['arg1']) && is_numeric($_GET['arg2'])) {
        $firstNum = $_GET['arg1'];
        $secondNum = $_GET['arg2'];
        $operation = $_GET['operation'];

        switch ($operation) {
            case $ADDITION:
                echo $firstNum + $secondNum;
                break;
            case $SUBTRACTION:
                echo $firstNum - $secondNum;
                break;
            case $MULTIPLICATION:
                echo $firstNum * $secondNum;
                break;
            case $DIVISION:
                if ($secondNum != 0) {
                    echo $firstNum / $secondNum;
                } else {
                    echo "На 0 делить нельзя!";
                }
                break;
            default:
                echo "Неверно введен оператор!";
        }
    } else {
        echo "Один из аргументов arg1, arg2 не число!";
    }
