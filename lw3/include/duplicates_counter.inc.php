<?php
/**
 * @param string $inputString
 * @return array
 */
function countDuplicates(string $inputString) {
    $inputArray = $inputString == "" ? array() : str_split_unicode(mb_strtolower($inputString));
    $stringLength = count($inputArray);
    $outputArray = array();
    for ($i = 0; $i < $stringLength; ++$i) {
        $counter = 0;
        if (!array_key_exists($inputArray[$i], $outputArray)) {
            for ($j = $i; $j < $stringLength; ++$j) {
                if ($inputArray[$i] == $inputArray[$j]) {
                    $counter++;
                }
            }

            $outputArray += [$inputArray[$i] => $counter];
        }
    }

    return ($outputArray);
}

/**
 * @param string $str
 * @return array
 */
function str_split_unicode(string $str) {
    return (preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY));
}

/**
 * @param array $array
 */
function printDuplicates(array $array) {
    foreach ($array as $key => $value) {
        if ($key == ' ') {
            echo nl2br("'" . $key . "'(пробел) - " .  $value . PHP_EOL);
        } else {
            echo nl2br($key . " - " . $value . PHP_EOL);
        }
    }
}