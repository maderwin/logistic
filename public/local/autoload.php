<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @param $className
 * @return bool
 */
spl_autoload_register(function ($className) {
    if (!\CModule::RequireAutoloadClass($className)) {
        $path = P_CLASSES . str_replace(array('/','\\'), DIRECTORY_SEPARATOR, $className) . '.php';

        if (file_exists($path)) {
            require_once $path;
            return true;
        }
        return false;
    }
    return true;
}, false);

require_once P_VENDOR . 'autoload.php';
