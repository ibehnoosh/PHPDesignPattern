<?php
interface QuestionFormat
{
    public function getQuestions();
}

class XMLQuestion implements QuestionFormat
{
    protected $questions;

    public function __construct($questions)
    {
        $this->questions = $questions;
    }

    public function getQuestions()
    {
        return $this->questions;
    }
}

class JSONQuestion implements QuestionFormat
{
    protected $questions;

    public function __construct($questions)
    {
        $this->questions = $questions;
    }

    public function getQuestions()
    {
        return $this->questions;
    }
}

class XMLToJSONAdapter implements QuestionFormat
{
    protected $xml;

    public function __construct(XMLQuestion $xml)
    {
        $this->xml = $xml;
    }

    public function getQuestions()
    {
        $xmlQuestions = $this->xml->getQuestions();
        $jsonQuestions = json_encode($xmlQuestions);
        return $jsonQuestions;
    }
}
