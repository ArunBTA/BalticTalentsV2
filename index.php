<?php

$dir = __DIR__;
$base = $_SERVER['SCRIPT_NAME'];
$index = strpos($_SERVER['SCRIPT_NAME'], 'index.php');
if ($index !== false) {
    $base = substr($_SERVER['SCRIPT_NAME'], 0, $index);
}

if ($_SERVER['REQUEST_URI'] == $base) {
    $ctrl = 'radars/list';
} else {
    $ctrl = substr($_SERVER['REQUEST_URI'], strlen($base));
    $index = strpos($ctrl, '?');
    if ($index !== false) {
        $ctrl = substr($ctrl, 0, $index);
    }
}

if (!file_exists('controllers/'.$ctrl.'.php')) {
    $ctrl = 'radars/list';
}

include 'views/header.php';
include 'views/menu.php';
include 'controllers/'.$ctrl.'.php';
include 'views/footer.php';
