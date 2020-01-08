<?php
namespace App;

class Database
{
    private static $_instance;

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            $class = __CLASS__;
            self::$_instance = new \DB\SQL('sqlite:db/database.sqlite');
        }

        return self::$_instance;
    }
}
