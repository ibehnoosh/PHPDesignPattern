<?php


interface Observer
{
    public function update(Student $student);
}

interface Subject
{
    public function attach(Observer $observer);

    public function detach(Observer $observer);

    public function notify();
}

class Teacher implements Observer
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update(Student $student)
    {
        echo $this->name . " has been notified of a grade change for student " . $student->getName() . PHP_EOL;
    }
}

class Student implements Subject
{
    protected $name;
    protected $grade;
    protected $observers = [];

    public function __construct($name, $grade)
    {
        $this->name = $name;
        $this->grade = $grade;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
        $this->notify();
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

$teacher1 = new Teacher("Mr. Smith");
//$teacher2 = new Teacher("Ms. Johnson");

$student = new Student("John Doe", "A");
$student->attach($teacher1);
//$student->attach($teacher2);

$student->setGrade("B");

