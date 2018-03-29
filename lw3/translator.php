<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

const DICTIONARY = [
    'Keyboard' => 'клавиатура',
    'Smart' => 'умный',
    'Ability' => 'умение'
];

try {
    $paramsNumber = Count($_GET);
    if ((!isset($_GET['word'])) || ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        throw new Exception("параметр word отсутствует, или задан неверно!");
    }

    echo processTranslation($_GET['word']);
} catch(Exception $ex) {
    echo $ex->getMessage();
}

