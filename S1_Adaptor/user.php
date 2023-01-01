<?php
class SMSAdaptor
{
    private $sms;
    public function __construct(SMS $sms)
    {
        $this->sms=$sms;
    }

    public function sendSms()
    {
        $this->sms->sendSmsNOtification();
    }
}
class SMS
{
    public function sendSmsNOtification()
    {
        echo "Send Sms".PHP_EOL;
    }
}
class User
{
    private $sms;
    public function __construct(SMSAdaptor $sms)
    {
        $this->sms=$sms;
    }

    public function create()
    {
        echo "User Created".PHP_EOL;
        $this->sms->sendSms();
    }
}

class Order
{
    private $sms;
    public function __construct(SMSAdaptor $sms)
    {
        $this->sms=$sms;
    }

    public function create()
    {
        echo "Order Created".PHP_EOL;
        $this->sms->sendSms();
    }
}
 $user=new User(new SMSAdaptor(new SMS()));
$user->create();

$order=new Order(new SMSAdaptor(new SMS()));
$order->create();