<?php
header('Content-type: text/html; charset=utf-8');
require_once 'include/common.inc.php';

if ($argc != 2) {
    echo "Incorrect number of arguments!\n Usage php remove_duplicates.php <\input string>";
    return;
}

echo removeDuplicates($argv[1]);

// 2 variant
//$charArray = array_unique($charArray);
//echo implode($charArray);
