<?php
const DICTIONARY = [
    'Keyboard' => 'клавиатура',
    'Smart' => 'умный',
    'Ability' => 'умение'
];

$paramsNumber = Count($_GET);

if ((!isset($_GET['word'])) || ($paramsNumber != 1)) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

$keyWord = $_GET['word'];
if (array_key_exists($keyWord, DICTIONARY)) {
    echo DICTIONARY[$keyWord];
} else {
    $translateWord = array_search($keyWord, DICTIONARY);
    if ($translateWord != false) {
        echo $translateWord;
    } else {
        header('HTTP/1.1 404 Not Found');
        return;
    }
}
