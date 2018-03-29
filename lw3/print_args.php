<?php
header('Content-type: text/html; charset=utf-8');

if ($argc == 1) {
    echo "No parameters were specified!";
    return;
}

$argCount = $argc - 1;
echo "Number of arguments: {$argCount}\n";
echo "Arguments: ";
for ($i = 1; $i < $argc; ++$i) {
    echo "$argv[$i] ";
}