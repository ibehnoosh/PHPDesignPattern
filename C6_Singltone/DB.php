<?php
final class DB
{
    private static $instance;

    private function __construct()
    {
        // Hide the constructor
    }

    public static function getInstance(): DB
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone()
    {
        // Disable cloning
    }

    private function __wakeup()
    {
        // Disable unserialize
    }
}
$president1 = DB::getInstance();
$president2 = DB::getInstance();

var_dump($president1 === $president2); // true