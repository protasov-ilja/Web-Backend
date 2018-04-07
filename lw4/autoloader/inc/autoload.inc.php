<?php
function autoloader() {
    $files = scandir(__DIR__);
    $searchedAttributes = ".inc.php";
    foreach ($files as $name) {
        if (!is_dir(__DIR__ . "/" . $name) && file_exists(__DIR__ . "/" . $name) && strpos($name, $searchedAttributes)) {
            require_once($name);
        }
    }
}

