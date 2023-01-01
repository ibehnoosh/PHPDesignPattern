<?php
interface Cost
{

    public function getCost();
    public function getTotalCost();
    public function getDescription();
    public function getDetails();
}
class BasketCost implements Cost
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

class ShippingDecorator implements Cost
{
    private $cost;
    public function __construct(Cost $cost)
    {
        $this->cost=$cost;
    }
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
        return $this->cost->getTotalCost() + self::getCost();
    }

    public function  getDetails()
    {
        return  $this->cost->getDetails() + [
                self::getDescription()=>self::getCost()
            ];
    }
}

class TaxDecorator implements Cost
{
    private $cost;
    public function __construct(Cost $cost)
    {
        $this->cost=$cost;
    }
    public function getCost()
    {
        return $this->cost->getTotalCost()*0.09;
    }
    function getDescription()
    {
        return 'Tax Cost';
    }
    public function getTotalCost()
    {
        return  $this->cost->getTotalCost() + self::getCost();
    }

    public function  getDetails()
    {
        return  $this->cost->getDetails() + [
                self::getDescription()=>self::getCost()
            ];
    }
}
//$basketCost=new BasketCost;
//$shippingAndBasketCost= new ShippingDecorator(new BasketCost());

$basketWithTax= new TaxDecorator(new BasketCost());
$shippingAndBasketCost= new ShippingDecorator($basketWithTax);

var_dump($shippingAndBasketCost->getDetails());
var_dump($shippingAndBasketCost->getTotalCost());