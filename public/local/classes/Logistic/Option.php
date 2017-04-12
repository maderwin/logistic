<?php

namespace Logistic;

use Bitrix\Highloadblock\HighloadBlockTable as HL;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Entity\DataManager;
use Maderwin\Traits\Cached;

\Bitrix\Main\Loader::includeModule('highloadblock');

class Option
{
    use Cached;

    protected static $arRegistry = [];
    protected static $entity;

    /**
     * @return DataManager
     */
    protected static function getEntity()
    {
        if (static::$entity) {
            return static::$entity;
        }

        $arHLBlock = HL::getById(HL_OPTION)->fetch();
        $obEntity = HL::compileEntity($arHLBlock);
        return static::$entity = $obEntity->getDataClass();
    }

    protected static function getQuery()
    {
        return new Query(static::getEntity());
    }

    protected static function getEntry($code)
    {

        return static::getQuery()
            ->setSelect([
                'CODE' => 'UF_CODE',
                'VALUE' => 'UF_VALUE',
                'ACTIVE' => 'UF_ACTIVE'
            ])
            ->setFilter(['UF_CODE' => $code])
            ->setLimit(1)
            ->exec()
            ->fetch();
    }

    public static function get($key, $default = false)
    {
        if(static::isCached()) return static::getCache();

        if (isset(static::$arRegistry[$key])) {
            return static::$arRegistry[$key];
        }

        if ($arOption = static::getEntry($key)) {
            return static::setCache(static::$arRegistry[$key] = ($arOption['ACTIVE']) ? $arOption['VALUE'] : false);
        } else {
            return static::setCache($default);
        }

    }

    public static function set($key, $value)
    {
        $arOption = static::getEntry($key);
        $entity = static::getEntity();

        static::$arRegistry[$key] = $value;
        if ($arOption) {
            $entity::update(
                $arOption['ID'],
                ['UF_VALUE' => $value]
            );
        } else {
            $entity::add(
                [
                    'UF_CODE' => $key,
                    'UF_VALUE' => $value
                ]
            );
        }
        static::dropCache('get');
    }
}