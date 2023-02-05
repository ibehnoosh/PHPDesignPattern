<?php


// Class for User Management component
class UserManager
{
    public function registerUser($userData)
    {
        // code to register a user
    }
}

// Class for Payment Processing component
class PaymentProcessor
{
    public function processPayment($paymentData)
    {
        // code to process payment
    }
}

// Class for Content Delivery component
class ContentDelivery
{
    public function deliverContent($contentId)
    {
        // code to deliver content
    }
}

// Class for Reporting component
class Reporting
{
    public function generateReport($reportData)
    {
        // code to generate report
    }
}

// The Facade class
class CourseFacade
{
    private $userManager;
    private $paymentProcessor;
    private $contentDelivery;
    private $reporting;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->paymentProcessor = new PaymentProcessor();
        $this->contentDelivery = new ContentDelivery();
        $this->reporting = new Reporting();
    }

    public function registerAndOrderCourse($userData, $paymentData, $contentId)
    {
        $userId = $this->userManager->registerUser($userData);
        $paymentStatus = $this->paymentProcessor->processPayment($paymentData);
        if ($paymentStatus) {
            $content = $this->contentDelivery->deliverContent($contentId);
            $this->reporting->generateReport(array("userId" => $userId, "contentId" => $contentId));
            return "Course ordered successfully";
        } else {
            return "Payment failed";
        }
    }
}

// Usage
$courseFacade = new CourseFacade();
$result = $courseFacade->registerAndOrderCourse(array("name" => "John Doe"), array("amount" => 100), 123);
echo $result;

