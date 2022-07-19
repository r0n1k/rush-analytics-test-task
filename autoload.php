<?php

spl_autoload_register(static function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    include_once "$className.php";
});
