<?php
    if ($argc != 2) {
        echo "Incorrect number of arguments!\n Usage php remove_duplicates.php <\input string>";
        return;
    }

    $charArray = str_split($argv[1]);
    $arrayLength = sizeof($charArray);
    $outputArray = [];
    for ($i = 0; $i < $arrayLength; ++$i) {
        if (!in_array($charArray[$i], $outputArray)) {
            array_push($outputArray, $charArray[$i]);
        }
    }

    echo implode($outputArray);

// 2 variant
//$charArray = array_unique($charArray);
//echo implode($charArray);
