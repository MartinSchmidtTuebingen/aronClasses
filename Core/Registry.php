<?php

namespace Aron\Core;

class Registry
{
    private static $instances;

    public static function get(string $className): object
    {
        if (!isset(self::$instances[$className])) {

            self::$instances[$className] = new $className();
        }

        return self::$instances[$className];
    }

    public static function set(string $className, $classInstance): void
    {
        self::$instances[$className] = $classInstance;
    }

    public static function getSession(): Session
    {
        return self::get(Session::class);
    }

    public static function getConfig(): Config
    {
        return self::get(Config::class);
    }

    public static function getRequest(): Request
    {
        return self::get(Request::class);
    }

    public static function getUtils(): Utils
    {
        return self::get(Utils::class);
    }
}
