<?php
    // password_strength.php

    require_once 'include/common.inc.php';

    $queryString = explode('&', $_SERVER['QUERY_STRING']);
    $paramsNumber = sizeof($queryString);
    if ((!isset($_GET['password'])) || ($paramsNumber != 1)) {
        header('HTTP/1.1 400 Bad Request');
        return;
    }

    if (strlen($_GET['password']) != 0) {
        echo (checkPasswordStrength($_GET['password']));
    } else {
        echo "text is empty";
    }