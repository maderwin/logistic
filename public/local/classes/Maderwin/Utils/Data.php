<?php

namespace Maderwin\Utils;

class Data {
    protected static $lists;

    public static function SetList($listId, $arr, $default = null)
    {
        self::$lists[$listId] = $arr;
        self::$lists[$listId]['default'] = $default;
    }

    public static function GetListItem($listId, $itemId)
    {
        return
            (!is_null($itemId) && isset(self::$lists[$listId]) && isset(self::$lists[$listId][$itemId]))
                ? self::$lists[$listId][$itemId]
                : self::$lists[$listId]['default'];
    }
}