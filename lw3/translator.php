<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once 'include/common.inc.php';

const DICTIONARY = [
    'Keyboard' => 'клавиатура',
    'Smart' => 'умный',
    'Ability' => 'умение'
];

function processTranslation($keyWord) {
    if (array_key_exists($keyWord, DICTIONARY)) {
        $translation = DICTIONARY[$keyWord];
    } else {
        $translateWord = array_search($keyWord, DICTIONARY);
        if ($translateWord != false) {
            $translation = $translateWord;
        } else {
            header('HTTP/1.1 404 Not Found');
            throw new Exception("запрошен перевод неизвестного слова!", 404);
        }
    }

    return $translation;
}

try {
    $paramsNumber = count($_GET);
    if ((!isset($_GET['word'])) || ($paramsNumber != 1) || ($_GET['word'] == "")) {
        header('HTTP/1.1 400 Bad Request');
        throw new Exception("параметр word отсутствует, или задан неверно!");
    }

    echo processTranslation($_GET['word']);
} catch(Exception $ex) {
    echo $ex->getMessage();
}

