<?php
    // without_last.php

    require_once 'include/common.inc.php';

    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);

    if ((!isset($_GET['str'])) && ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        return;
    }

    if (strlen($_GET['str']) != 0){
        echo (withoutLast($_GET['str']));
    } else {
        header('HTTP/1.1 404 Not Found');
    }
