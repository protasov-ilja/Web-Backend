<?php
// check_identifier.php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

if ((!isset($_GET['identifier'])) || (count($_GET) != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

if (strlen($_GET['identifier']) != 0) {
    echo checkIdentifier($_GET['identifier']);
} else {
    echo "no: identifier is empty";
}
