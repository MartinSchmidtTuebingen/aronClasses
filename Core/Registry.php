<?php

namespace Aron\Core;

class Registry
{
    private static $instances;

    public static function get(string $className)
    {
        $className = 'Aron\Core\\' . $className;
        if (!isset(self::$instances[$className])) {

            self::$instances[$className] = new $className();
        }

        return self::$instances[$className];
    }

    public static function set(string $className, $classInstance)
    {
        self::$instances[$className] = $classInstance;
    }

    public static function getSession(): Session
    {
        return self::get('Session');
    }

    public static function getConfig(): Config
    {
        return self::get('Config');
    }

    public static function getRequest(): Request
    {
        return self::get('Request');
    }
}
