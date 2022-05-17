<?php
session_start();
spl_autoload_register(function ($class) {
    $file_name = __DIR__ . "/models/" . $class . ".php";
    if (file_exists($file_name)) {
        require_once $file_name;
    } else {
        require_once __DIR__ . "/controllers/" . $class . ".php";
    }
});
