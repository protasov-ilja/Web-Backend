<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'include/common.inc.php';

$paramsNumber = Count($_GET);
if ((!isset($_GET['string'])) || ($paramsNumber != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

countAndDisplayDuplicates($_GET['string']);
