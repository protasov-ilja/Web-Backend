<?php
require_once 'vendor/autoload.php';
require_once("include/common.inc.php");

echo getView("template/index.twig");

//$loader = new Twig_Loader_Filesystem('templates');
//$twig = new Twig_Environment($loader, array(
//    'cache' => 'compilation_cache',
//    'auto_reload' => true
//));
//
//echo $twig->render('Hello {{ name }}!', array('name' => 'Fabien'));