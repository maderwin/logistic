<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Подключение путей, констант и функций
require($_SERVER["DOCUMENT_ROOT"] . "/local/define.php");

// Подключение автоподгрузки классов
require($_SERVER["DOCUMENT_ROOT"] . "/local/autoload.php");

// Подключение почтовых функций
require($_SERVER["DOCUMENT_ROOT"] . "/local/mail.php");


\Logistic\EventHandler::init();

\Logistic\EventEmitter::getInstance()->emit(
    'init',
    [
        \Bitrix\Main\Context::getCurrent()
            ->getRequest()
            ->toArray()
    ]
);

