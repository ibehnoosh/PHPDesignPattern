<?php
abstract class WhatIsCHain
{
    protected $chainObj;
    protected $nextChain;

    public function __construct(whatIsObject $object)
    {
        $this->chainObj=$object;
    }
    public function setNextChain($obj)
    {
        $this->nextChain=$obj;
    }

    protected function goToNextChain($code)
    {
        if ($this->nextChain == null){
            return true;
        }
        return $this->nextChain->MainFunc($code);
    }
    abstract function MainFunc($code);

}

class fistChain extends WhatIsCHain
{

    function MainFunc($code)
    {
        if (empty($this->chainObj->find($code))){

            throw new Exception('Code Not exists');
        }

        echo 'Object exists' . PHP_EOL;
        return $this->goToNextChain($code);
    }
}
class secondChain extends WhatIsCHain
{

    function MainFunc($code)
    {
        if (!($this->chainObj->isActive($code))){

            throw new Exception('Code Not exists');
        }

        echo 'Object isActive' . PHP_EOL;
        return $this->goToNextChain($code);
    }
}
class thirdChain extends WhatIsCHain
{
    function MainFunc($code)
    {
        if (($this->chainObj->isExpired($code))) {

            throw new Exception('Code is Expire');
        }

        echo 'Object is not Expired' . PHP_EOL;
        return $this->goToNextChain($code);
    }

}

class whatIsChainOrder
{
    private $chain;
    public function __construct(whatIsObject $chain)
    {
        $this->chain=$chain;
    }

    function setChainOrder($code)
    {
        $first=new fistChain($this->chain);
        $second=new secondChain($this->chain);
        $third=new thirdChain($this->chain);

        $first->setNextChain($second);
        $second->setNextChain($third);
        $first->MainFunc($code);
    }

}

class whatIsObject
{
    public function __construct()
    {

    }
    public function find(string $code)
    {
        return true;
    }

    public function isActive(string $code)
    {
        return true;
    }

    public function isExpired(string $code)
    {
        return false;
    }
}


$code='Moshtagh';
$Chain=new whatIsObject();
$chaining=new whatIsChainOrder($Chain);
$chaining->setChainOrder($code);