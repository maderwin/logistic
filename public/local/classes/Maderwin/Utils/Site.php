<?php
namespace Maderwin\Utils;

class Site
{
    protected static $siteData;

    public static function get(){
        return \CSite::GetByID(SITE_ID)->Fetch();
    }

    /**
     * Получает все настройки сайта
     */
    protected static function GetOptionList()
    {
        if (self::$siteData === null) {
            $cSite = new \CSite();
            $rsSites = \CSite::GetByID($cSite->GetDefSite(SITE_ID));
            self::$siteData = $rsSites->Fetch();
        }

        return self::$siteData;
    }


    /**
     * Получает значение параметра сайта по ключу
     *
     * @param string $key
     *
     * @return string
     */
    public static function GetOption($key)
    {
        $data = self::GetOptionList();
        if (isset($data[$key])) {
            return $data[$key];
        }

        switch ($key) {
            case 'HOST':
                return $_SERVER['HTTP_HOST'];
        }

        return null;
    }
}