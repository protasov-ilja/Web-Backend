<?php
    header("Content-Type: text/plain");
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        echo "Hello Dear $name!";
    }
