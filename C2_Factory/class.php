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


//3. Create the MAin Factory! in this factory we should declare which type we want!
abstract class educationProgramFactory
{
    abstract protected function makeClass():UniversityClass;
    public  function createEducationProgram():void
    {
        $classType=$this->makeClass();
        $classType->createClass();
    }
}
// 4. Create factory for different type
class PrivateEducationProgramFactory extends educationProgramFactory
{
    protected function makeClass(): UniversityClass
    {
        return new PrivateClass();
    }
}
class PublicEducationProgramFactory extends educationProgramFactory
{
    protected function makeClass(): UniversityClass
    {
        return new publicClass();
    }
}


$private= new PrivateEducationProgramFactory();
$private->createEducationProgram();


$public= new PublicEducationProgramFactory();
$public->createEducationProgram();