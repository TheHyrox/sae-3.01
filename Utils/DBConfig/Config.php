<?php

namespace DBConfig;

class Config
{
    private static array $settings = [
        'host' => 'localhost',
        'dbname' => 'inf2pj_06',
        'user' => 'root',
        'password' => ''
    ];

    public static function get($key)
    {
        return self::$settings[$key] ?? null;
    }

    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }
}