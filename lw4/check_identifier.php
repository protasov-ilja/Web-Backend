<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

try {
    if ((!isset($_GET['identifier'])) || (count($_GET) != 1) || (empty($_GET['identifier']))) {
        header('HTTP/1.1 400 Bad Request');
        throw new Exception("отсутствует или неправильный аргумент identifier");
    }

    echo checkIdentifier($_GET['identifier']);
} catch(Exception $ex) {
    echo $ex->getMessage();
}
