<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

function getCorrectPassword(string $inputString) {
    $password = str_split($inputString);
    $arrayLength = count($password);
    for ($i = 0; $i < $arrayLength; ++$i) {
        if (!(ctype_alpha($password[$i]) || ctype_digit($password[$i]))) {
            throw new Exception("error: пароль должен содержать только цифры или буквы английского языка!");
        }
    }

    return $password;
}

try {
    if ((!isset($_GET['password'])) || (count($_GET) != 1) || (strlen($_GET['password']) == 0)) {
        throw new Exception("отсутствует или неправильный аргумент identifier");
    }

    $password = getCorrectPassword($_GET['password']);
    echo getPasswordStrength($password);
} catch(Exception $ex) {
    header('HTTP/1.1 400 Bad Request');
    echo $ex->getMessage();
}
