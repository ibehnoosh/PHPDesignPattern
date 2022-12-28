<?php
// 1. Declare what we want! we want public and private Class. We also want different class for adult and children
interface EducationClass
{
    public function getDescription();
}

class PublicClass implements EducationClass
{
    public function getDescription()
    {
        echo 'This is a Public Class'.PHP_EOL;
    }
}

class PrivateClass implements EducationClass
{
    public function getDescription()
    {
        echo 'This is a Private Class'.PHP_EOL;
    }
}

//************************

interface EducationClassStudent
{
    public function getDescription();
}

class Adult implements EducationClassStudent
{
    public function getDescription()
    {
        echo 'I am Adult'.PHP_EOL;
    }
}

class Child implements EducationClassStudent
{
    public function getDescription()
    {
        echo 'I am Child'.PHP_EOL;
    }
}

//---------------------------------------------
//         Factories 1
//---------------------------------------------

interface ClassFactory
{
    public function makeClass(): EducationClass;
    public function makeStudentOfClass(): EducationClassStudent;
}
class PublicClassFactory implements ClassFactory
{
    function makeClass(): EducationClass
    {
        return new PublicClass();
    }
    public function makeStudentOfClass(): EducationClassStudent
    {
        return new Adult();
    }
}
//---------------------------------------------
//         Factories 2
//---------------------------------------------
class PrivateClassFactory implements ClassFactory
{
    function makeClass(): EducationClass
    {
        return new PrivateClass();
    }
    public function makeStudentOfClass(): EducationClassStudent
    {
        return new Child();
    }
}


$ClassFactory= new PublicClassFactory();
$class=$ClassFactory->makeClass();
$student=$ClassFactory->makeStudentOfClass();

$class->getDescription();
$student->getDescription();

$ClassFactory= new PrivateClassFactory();
$class=$ClassFactory->makeClass();
$student=$ClassFactory->makeStudentOfClass();

$class->getDescription();
$student->getDescription();