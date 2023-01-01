<?php
class Singleton
{
    private static $instance;

    protected function __construct()
    {
        // Hide the constructor
    }

    public static function getInstance(): Singleton
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __clone()
    {
        // Disable cloning
    }

    public function __wakeup()
    {
        // Disable unserialize
    }
}

class config extends Singleton
{
    public function getData()
    {
        return [
            'host' => '127.0.1.1'
        ];
    }
}
$president1 = config::getInstance();
$president2 = config::getInstance();

var_dump($president1);
var_dump($president1 === $president2); // true