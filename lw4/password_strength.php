<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

try {
    if ((!isset($_GET['password'])) || (count($_GET) != 1) || (strlen($_GET['password']) == 0)) {
        throw new Exception("отсутствует или неправильный аргумент identifier");
    }

    echo getPasswordStrength(str_split($_GET['password']));
} catch(Exception $ex) {
    header('HTTP/1.1 400 Bad Request');
    echo $ex->getMessage();
}
