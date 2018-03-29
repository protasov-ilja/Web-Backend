<?php
// last.php

require_once 'include/common.inc.php';

$paramsNumber = Count($_GET);

if ((!isset($_GET['str'])) || ($paramsNumber != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

if (strlen($_GET['str']) != 0) {
    echo(last($_GET['str']));
} else {
    header('HTTP/1.1 404 Not Found');
}
