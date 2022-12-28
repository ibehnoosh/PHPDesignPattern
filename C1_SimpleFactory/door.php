<?php
// 1- Make a Interface to declare what we want to build!
interface Door
{
    public function getWidth(): float;
    public function getHeight(): float;
}

// 2- Implement that!
class WoodenDoor implements Door
{
    protected $width;
    protected $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}
// 3- Build a Factory to build for us!
class DoorFactory
{
    public static function makeDoor($width, $height): Door
    {
        return new WoodenDoor($width, $height);
    }
}

// 4- Order it! and we don;t know anything about how it build!
$door = DoorFactory::makeDoor(100, 200);

echo 'Width: ' . $door->getWidth();
echo PHP_EOL;
echo 'Height: ' . $door->getHeight();
