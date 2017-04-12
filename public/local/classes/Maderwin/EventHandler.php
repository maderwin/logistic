<?php
namespace Maderwin;

use Bitrix\Main\EventManager;

class EventHandler {

    /**
     * Инициализировать базовые события
     */
    public static function init() {
        EventManager::getInstance()->addEventHandler("main", "OnEpilog", function(){
            static::Redirect404();
            unset($_SESSION['FLASH_MESSAGES']);
        });
    }

    /**
     *
     */
    public static function Redirect404() {
        if (
            !defined('ADMIN_SECTION') &&
            ((defined("ERROR_404") && ERROR_404 == "Y") || (function_exists("http_response_code") && http_response_code() == 404)) &&
            file_exists($_SERVER["DOCUMENT_ROOT"] . "/404.php")
        ) {
            global $APPLICATION;
            $APPLICATION->RestartBuffer();
            if (!defined('ERROR_404')) define("ERROR_404", "Y");

            include(P_DR . SITE_TEMPLATE_PATH . '/header.php');
            include(P_DR . "/404.php");
            include(P_DR . SITE_TEMPLATE_PATH . '/footer.php');
        }
    }
}
