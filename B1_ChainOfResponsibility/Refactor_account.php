<?php

//Define What is Chain?
abstract class Account
{
    protected $successor;
    protected $balance;


    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function setNext(Account $account)
    {
        $this->successor = $account;
    }

    public function pay(float $amountToPay)
    {
        if ($this->canPay($amountToPay)) {
            echo sprintf('Paid %s using %s' . PHP_EOL, $amountToPay, get_called_class());
        } elseif ($this->successor) {
            echo sprintf('Cannot pay using %s. Proceeding ..' . PHP_EOL, get_called_class());
            $this->successor->pay($amountToPay);
        } else {
            throw new Exception('None of the accounts have enough balance');
        }
    }

    abstract function canPay($amount): bool;
}

class PayOrder
{
    public function setOrder($money,$bankB,$paypalB,$bitcoinB)
    {
        $bank = new Bank($bankB);          // Bank with balance 100
        $paypal = new Paypal($paypalB);      // Paypal with balance 200
        $bitcoin = new Bitcoin($bitcoinB);    // Bitcoin with balance 300

        $bank->setNext($paypal);
        $paypal->setNext($bitcoin);
        $bank->pay($money);
    }

}

class Bank extends Account
{
     function canPay($amount): bool
    {
        return $this->balance >= $amount;
    }
}

class Paypal extends Account
{
    function canPay($amount): bool
    {
        return $this->balance >= $amount;
    }
}

class Bitcoin extends Account
{
    function canPay($amount): bool
    {
        return $this->balance >= $amount;
    }
}


$payOrder=new PayOrder();
$payOrder->setOrder(180,100,200,300);
