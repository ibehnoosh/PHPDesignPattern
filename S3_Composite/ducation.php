<?php


interface CourseComponent
{
    public function getName();

    public function getPrice();
}

class Course implements CourseComponent
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class CourseCategory implements CourseComponent
{
    private $name;
    private $components = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addComponent(CourseComponent $component)
    {
        $this->components[] = $component;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        $price = 0;
        foreach ($this->components as $component) {
            $price += $component->getPrice();
        }
        return $price;
    }
}

// Usage
$programmingCategory = new CourseCategory("Programming");
$programmingCategory->addComponent(new Course("Introduction to Python", 100));
$programmingCategory->addComponent(new Course("Advanced Python", 200));

$mathCategory = new CourseCategory("Math");
$mathCategory->addComponent(new Course("Calculus I", 150));
$mathCategory->addComponent(new Course("Calculus II", 200));

$courseCatalog = new CourseCategory("Course Catalog");
$courseCatalog->addComponent($programmingCategory);
$courseCatalog->addComponent($mathCategory);

echo "Total price of courses in the course catalog: " . $courseCatalog->getPrice();

