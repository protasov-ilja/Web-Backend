<?php

function processTranslation($keyWord) {
    if (array_key_exists($keyWord, DICTIONARY)) {
        $translation = DICTIONARY[$keyWord];
    } else {
        $translateWord = array_search($keyWord, DICTIONARY);
        if ($translateWord != false) {
            $translation = $translateWord;
        } else {
            header('HTTP/1.1 404 Not Found');
            throw new Exception("запрошен перевод неизвестного слова!");
        }
    }

    return $translation;
}