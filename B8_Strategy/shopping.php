<?php
interface CalculateTotalCostStrategy {
    public function calculate(array $items);
}

class DiscountCodeStrategy implements CalculateTotalCostStrategy {
    public function calculate(array $items) {
        $discount = 10;
        // logic to apply discount code
        return array_sum($items) - $discount;
    }
}

class ShippingCostStrategy implements CalculateTotalCostStrategy {
    public function calculate(array $items) {
        $shippingCost = 10;
        // logic to calculate shipping costs
        return array_sum($items) + $shippingCost;
    }
}

class ShoppingCart {
    private $strategy;

    public function __construct(CalculateTotalCostStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(CalculateTotalCostStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateTotalCost(array $items) {
        return $this->strategy->calculate($items);
    }
}

//strategies at runtime.
$shoppingCart = new ShoppingCart(new DiscountCodeStrategy());
$items = array(10, 20, 30);
echo $shoppingCart->calculateTotalCost($items); // output: 50 (total cost of items - discount)

$shoppingCart->setStrategy(new ShippingCostStrategy());
echo $shoppingCart->calculateTotalCost($items); // output: 70 (total cost of items + shipping cost)
