<?php

class CourseMaterialBuilder
{
    protected $title;
    protected $description;
    protected $slides = [];
    protected $notes = [];
    protected $quizzes = [];

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function addSlide($slide)
    {
        $this->slides[] = $slide;
        return $this;
    }

    public function addNote($note)
    {
        $this->notes[] = $note;
        return $this;
    }

    public function addQuiz($quiz)
    {
        $this->quizzes[] = $quiz;
        return $this;
    }

    public function build()
    {
        return new CourseMaterial(
            $this->title,
            $this->description,
            $this->slides,
            $this->notes,
            $this->quizzes
        );
    }
}

class BasicCourseMaterialBuilder extends CourseMaterialBuilder
{
    public function build()
    {
        return new CourseMaterial(
            $this->title,
            $this->description,
            $this->slides,
            [],
            []
        );
    }
}

class AdvancedCourseMaterialBuilder extends CourseMaterialBuilder
{
    public function build()
    {
        return new CourseMaterial(
            $this->title,
            $this->description,
            $this->slides,
            $this->notes,
            $this->quizzes
        );
    }
}

class CourseMaterial
{
    protected $title;
    protected $description;
    protected $slides;
    protected $notes;
    protected $quizzes;

    public function __construct($title, $description, $slides, $notes, $quizzes)
    {
        $this->title = $title;
        $this->description = $description;
        $this->slides = $slides;
        $this->notes = $notes;
        $this->quizzes = $quizzes;
    }
}

/*
 * We can use these builders to build course materials for different types of students. For basic students, we can use
 * the BasicCourseMaterialBuilder, and for advanced students, we can use the AdvancedCourseMaterialBuilder.We can use
 * these builders to build course materials for different types of students. For basic students,
 *  we can use the BasicCourseMaterialBuilder, and for advanced students, we can use the AdvancedCourseMaterialBuilder.
 */

$basicBuilder = new BasicCourseMaterialBuilder();
$basicMaterial = $basicBuilder
    ->setTitle("Introduction to Programming")
    ->setDescription("Learn the basics of programming")
    ->addSlide("Slide 1: Overview of programming")
    ->addNote(['A','B'])
    ->addQuiz(['A','B']);
var_dump($basicBuilder);