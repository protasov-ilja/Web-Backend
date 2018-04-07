<?php
$files = scandir(__DIR__);
$searchedAttributes = ".inc.php";
foreach ($files as $name) {
    if (($name != "..") && ($name != ".") && (file_exists('.inc'. $name) != false) && (strpos($name, $searchedAttributes) != false)) {
        require_once($name);
    }
}
