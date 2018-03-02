<?php
    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ((!isset($_GET['string'])) && ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        return;
    }

    $inputString = mb_convert_case($_GET['string'], MB_CASE_LOWER, "UTF-8");
    $inputString = explode('', $inputString);
    $stringLength = sizeof($reverseArray);
    $checkArr = [];
    for ($i = 0; $i < $stringLength; ++$i) {
        $counter = 0;
        if (!in_array($inputString[$i], $checkArr)) {
            for ($j = 0; $j < $stringLength; ++$j) {
                if ($inputString[$i] = $inputString[$j]) {
                    $counter++;
                }
            }

            array_push($checkArr, $inputString[$i]);
            if ($inputString[$i] == ' ') {
                echo "\'$inputString[$i]\'(пробел) - $counter\n";
            } else {
                echo "$inputString[$i] - $counter\n";
            }
        }
    }