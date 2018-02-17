<?php
    $ADDITION = "add";
    $SUBTRACTION = "sub";
    $MULTIPLICATION = "mul";
    $DIVISION = "div";

    header("Content-Type: text/plain");
    if (isset($_GET['arg1'])) {
        $firstNum = $_GET['arg1'];

        if (isset($_GET['arg2'])) {
            $secondNum = $_GET['arg2'];

            if (isset($_GET['operation'])) {
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
                        echo $firstNum / $secondNum;
                        break;
                }
            }
        }
    }
