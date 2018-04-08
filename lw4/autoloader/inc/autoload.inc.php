<?php
function autoloader($directory) {
    $filesArray = array_diff(scandir($directory), array('.', '..', 'autoload.inc.php'));
    $searchedAttributes = ".inc.php";
    foreach ($filesArray as $name) {
        if (!is_dir($directory . $name) && strpos($name, $searchedAttributes)) {
            require_once($directory . $name);
        }
    }
}
