<?php

namespace App\Models;

/**
 * Class DB.
 */
class DB
{
    /**
     * @var \PDO
     */
    private static $connection;

    /**
     * @return \PDO
     */
    public static function connection()
    {
        if (self::$connection instanceof \PDO) {
            return self::$connection;
        }

        self::$connection = new \PDO('mysql:host=localhost;dbname=auto', 'root', 'toor');

        return self::$connection;
    }
}