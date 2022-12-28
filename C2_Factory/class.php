<?php
interface  UniversityClass
{
    function createClass();
}

class PrivateClass implements UniversityClass
{
    function createClass()
    {
        echo 'Private Class'.PHP_EOL;
    }
}

class publicClass implements UniversityClass
{
    function createClass()
    {
        echo 'Public Class'.PHP_EOL;
    }
}

abstract class educationProgram
{
    abstract protected function makeClass():UniversityClass;
    public  function createEducationProgram():void
    {
        $classType=$this->makeClass();
        $classType->createClass();
    }
}

class PrivateEducationProgram extends educationProgram
{
    protected function makeClass(): UniversityClass
    {
        return new PrivateClass();
    }
}
class PublicEducationProgram extends educationProgram
{
    protected function makeClass(): UniversityClass
    {
        return new publicClass();
    }
}

$private= new PrivateEducationProgram();
$private->createEducationProgram();


$public= new PublicEducationProgram();
$public->createEducationProgram();