<?php
// remove_extra_blanks.php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

if ((!isset($_GET['text'])) || (Count($_GET) != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

if (strlen($_GET['text']) != 0) {
    echo removeExtraBlanks($_GET['text']);
} else {
    echo "text is empty";
}
