<?php
    header("Content-Type: text/plain");

    if ((isset($_GET['arg1'])) && (isset($_GET['arg2']))) {
        $firstNum = $_GET['arg1'];
        $secondNum = $_GET['arg2'];
        $sum = $firstNum + $secondNum;

        echo $sum;
    }
