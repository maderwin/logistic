<?php

namespace Maderwin;


class BufferContent
{
    protected static $var = [];

    public static function Show($func)
    {
        global $APPLICATION;
        $APPLICATION->AddBufferContent(function () use ($func) {
            return static::$func();
        });
    }

    public static function SetVar($name, $value)
    {
        static::$var[$name] = $value;
    }
}