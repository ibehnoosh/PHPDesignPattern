<?php
class BasketCost
{
    public function getCost()
    {
        return 10000;
    }
    function getDescription()
    {
        return 'Basket Cost';
    }
    public function getTotalCost()
    {
        return self::getCost();
    }

    public function  getDetails()
    {
        return [
            self::getDescription()=>self::getCost()
        ];
    }
}

class BasketWithShipping extends BasketCost
{
    public function getCost()
    {
        return 1000;
    }
    function getDescription()
    {
        return 'Shipping Cost';
    }
    public function getTotalCost()
    {
        return parent::getTotalCost() + self::getCost();
    }

    public function  getDetails()
    {
        return parent::getDetails() + [
            self::getDescription()=>self::getCost()
        ];
    }
}
class BasketWithTax extends BasketCost
{
    public function getCost()
    {
        return parent::getTotalCost()*0.09;
    }
    function getDescription()
    {
        return 'Tax Cost';
    }
    public function getTotalCost()
    {
        return parent::getTotalCost() + self::getCost();
    }

    public function  getDetails()
    {
        return parent::getDetails() + [
                self::getDescription()=>self::getCost()
            ];
    }
}
class BasketWithShippingAndTax extends BasketWithTax
{
    public function getCost()
    {
        return 5000;
    }
    function getDescription()
    {
        return 'Shipping Cost';
    }
    public function getTotalCost()
    {
        return parent::getTotalCost() + self::getCost();
    }

    public function  getDetails()
    {
        return parent::getDetails() + [
                self::getDescription()=>self::getCost()
            ];
    }
}

$basket=new BasketWithShippingAndTax();
var_dump($basket->getDetails());
var_dump($basket->getTotalCost());