<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'include/common.inc.php';

$paramsNumber = count($_GET);
if ((!isset($_GET['string'])) || ($paramsNumber != 1) || ($_GET['string'] == "")) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

printDuplicates(countDuplicates($_GET['string']));