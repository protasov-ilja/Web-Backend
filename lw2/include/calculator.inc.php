<?php
function calculate($firstNum, $secondNum, $operation) {
    switch ($operation) {
        case "add":
            $result =  $firstNum + $secondNum;
            break;
        case "sub":
            $result =  $firstNum - $secondNum;
            break;
        case "mul":
            $result =  $firstNum * $secondNum;
            break;
        case "div":
            if ($secondNum != 0) {
                $result =  $firstNum / $secondNum;
            } else {
                throw new Exception("На 0 делить нельзя!");
            }
            break;
        default:
            throw new Exception("Неверно введен оператор!");
    }

    return $result;
}
