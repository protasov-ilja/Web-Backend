<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

if ((!isset($_GET['password'])) || (count($_GET) != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

if (strlen($_GET['password']) != 0) {
    echo checkPasswordStrength($_GET['password']);
} else {
    echo "text is empty";
}