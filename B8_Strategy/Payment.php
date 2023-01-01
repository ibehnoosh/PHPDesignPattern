<?php
// Strategy Principle
Interface PaymentStrategyInterface
{
    public function pay(int $amount);
}
class OnlinePaymentStrategy implements PaymentStrategyInterface
{

    public function pay(int $amount)
    {
        echo 'Pay '.$amount.' Online';
    }
}
class CashOnPaymentStrategy implements PaymentStrategyInterface
{

    public function pay(int $amount)
    {
        echo "Pay ".$amount." CashON";
    }
}
class CartToCartPaymentStrategy implements PaymentStrategyInterface
{

    public function pay(int $amount)
    {
        echo "Pay ".$amount." Cart to car";
    }
}

class  Payment
{
    private $strategy;
    public function __construct(PaymentStrategyInterface $paymentStrategy)
    {
        $this->setStrategy($paymentStrategy);
    }
    public  function setStrategy(PaymentStrategyInterface $paymentStrategy)
    {
        $this->strategy=$paymentStrategy;
    }
    public function pay(int $amount)
    {
        return $this->strategy->pay($amount);
    }
}

$payment= new Payment(new CartToCartPaymentStrategy());
$payment->pay(1500);