<?php
    header("Content-Type: text/plain");
    if (isset($_GET['arg1'])) {
        $firstNum = $_GET['arg1'];

        if (isset($_GET['arg2'])) {
            $secondNum = $_GET['arg2'];
            $sum = $firstNum + $secondNum;
            echo $sum;
        }
    }
