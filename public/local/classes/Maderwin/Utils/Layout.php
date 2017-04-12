<?php
namespace Maderwin\Utils;

class Layout {
    protected static $pageType = 'main';
    public static $pathList = array();

    public static function JsApp()
    {
        $GLOBALS['APPLICATION']->AddBufferContent(Array(static::class, "GetJSApp"));
    }

    public static function GetJSApp()
    {
        $arOptions = array(
            "isAuthorized" => User::IsAuthorized(),
            'path' => self::$pathList
        );

        return
            '<script>var App = {options:'
            . json_encode($arOptions)
            . '}</script>';
    }

    /**
     * Проверяет, находимся ли мы на главной странице
     * @return bool
     */
    public static function IsMain()
    {


        return rtrim($GLOBALS['APPLICATION']->GetCurPage(false), '/') == rtrim(SITE_DIR, '/');
    }

    /**
     * Определяет, запрошена ли страница через AJAX
     * @return bool
     */
    public static function IsAjax()
    {
        return
            isset($_REQUEST['ajax'])
            || (
                !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
            );
    }

    public static function ShowPageType()
    {
        $GLOBALS['APPLICATION']->AddBufferContent(Array(static::class, "GetPageType"));
    }

    public static function GetPageType()
    {
        return self::$pageType;
    }

    public static function SetPageType($pageType)
    {
        self::$pageType = $pageType;
    }
}