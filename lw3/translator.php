<?php
    $DICTIONARY = [
        'Keyboard' => 'клавиатура',
        'Smart' => 'умный',
        'Ability' => 'умение'
    ];

    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ((!isset($_GET['word'])) && ($paramsNumber != 1)) {
        return 400;
    }

    $keyWord = $_GET['word'];
    if (array_key_exists($keyWord, $DICTIONARY)) {
        echo $DICTIONARY[$keyWord];
    } else {
        $translateWord = array_search($keyWord,  $DICTIONARY);
        if ($translateWord != false) {
            echo $translateWord;
        } else {
            return 404;
        }
    }
