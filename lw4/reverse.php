<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

if ((!isset($_GET['str'])) || (count($_GET) != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

if (strlen($_GET['str']) != 0) {
    echo revers($_GET['str']);
} else {
    header('HTTP/1.1 404 Not Found');
}
