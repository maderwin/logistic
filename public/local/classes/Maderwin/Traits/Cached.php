<?php

namespace Maderwin\Traits;

trait Cached{
    protected static $cache;

    protected static function getCaller($nested = 1){
        $trace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, $nested + 1);

        return $trace[$nested];
    }
    protected static function isCached($nested = 1){
        $caller = static::getCaller($nested + 1);

        return
            isset(static::$cache[$caller['function']])
            && isset(static::$cache[$caller['function']][serialize($caller['args'])]);
    }

    protected static function getCache($nested = 1){
        if(!static::isCached($nested + 1)){
            return false;
        }

        $caller = static::getCaller($nested + 1);

        return static::$cache[$caller['function']][serialize($caller['args'])];
    }

    protected static function dropCache($method){
        unset (static::$cache[$method]);
    }

    protected static function setCache($value, $method = false, $nested = 1){
        $caller = static::getCaller($nested + 1);
        if($method){
            $caller['function'] =
                is_string($method)
                    ? $method
                    : (
                        isset($method['name'])
                            ? $method['name']
                            : 'method'
                    );
            $caller['args'] = (!is_string($method) && isset($method['args'])) ? $method['args'] : [];
        }

        if(!isset(static::$cache[$caller['function']])){
            static::$cache[$caller['function']] = [];
        }

        static::$cache[$caller['function']][serialize($caller['args'])] = $value;

        return $value;
    }
}