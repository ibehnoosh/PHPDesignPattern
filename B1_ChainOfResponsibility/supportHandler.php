<?php


abstract class SupportHandler
{
    protected $nextHandler;

    public function setNext(SupportHandler $handler)
    {
        $this->nextHandler = $handler;
    }

    public function handleRequest($requestType)
    {
        if ($this->nextHandler != null) {
            $this->nextHandler->handleRequest($requestType);
        }
    }
}

class ITDepartment extends SupportHandler
{
    public function handleRequest($requestType)
    {
        if ($requestType === "technical") {
            echo "IT Department will handle the request\n";
            return;
        }
        parent::handleRequest($requestType);
    }
}

class FinanceDepartment extends SupportHandler
{
    public function handleRequest($requestType)
    {
        if ($requestType === "payment") {
            echo "Finance Department will handle the request\n";
            return;
        }
        parent::handleRequest($requestType);
    }
}

class AdmissionDepartment extends SupportHandler
{
    public function handleRequest($requestType)
    {
        if ($requestType === "enrollment") {
            echo "Admission Department will handle the request\n";
            return;
        }
        parent::handleRequest($requestType);
    }
}

// Usage
$itDepartment = new ITDepartment();
$financeDepartment = new FinanceDepartment();
$admissionDepartment = new AdmissionDepartment();

$itDepartment->setNext($financeDepartment);
$financeDepartment->setNext($admissionDepartment);

$itDepartment->handleRequest("payment");
$itDepartment->handleRequest("technical");
$itDepartment->handleRequest("enrollment");

