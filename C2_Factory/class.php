<?php
//1. Declare what we want!
interface  UniversityClass
{
    function createClass();
}
// 2. Build different type of it
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


//3. Create the Factory! in this factory we should declare which type we want!
abstract class educationProgram
{
    abstract protected function makeClass():UniversityClass;
    public  function createEducationProgram():void
    {
        $classType=$this->makeClass();
        $classType->createClass();
    }
}
// 4. return initiation of different type
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