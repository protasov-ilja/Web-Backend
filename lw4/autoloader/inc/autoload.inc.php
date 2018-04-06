<?php
$files = scandir(__DIR__);
$searchedAttributes = ".inc.php";
foreach ($files as $name) {
    if (($name != "..") && ($name != ".") && (strpos($name, $searchedAttributes) != false)) {
        require_once($name);
    }
}
